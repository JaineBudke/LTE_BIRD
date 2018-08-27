<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Http\Request;
use \App\Log_book;
use \App\User;
use App\Object;
use App\Object_type;
use App\Component;
use App\Age_range;
use App\Saved_object;
use App\thematic_unit;
use App\evaluation_object;

class UserController extends Controller
{
    
    /**
     * Método de listagem do histórico de atividades do usuário
     */
    public function userHistoric( ){
        
        // instancia de log_book
        $logBook = new Log_book();
        // recupera ID do usuario logado
        $idUser = auth()->user()->id;
        // recupera historico de atividades efetuadas
        $activities = $logBook->where('id_user', '=', $idUser)->orderBy('created_at', 'desc')->paginate(10);

        return View('/client/clientHistoric', compact('activities'));

    }

    /**
     * Método de edição do perfil de usuário
     */
    public function editProfile( Request $request ){

        $user = new User();

        $idUser = auth()->user()->id;
        $user = User::findOrFail($idUser);
        $user->update($request->all());

        return Redirect::to('/client/perfil');
        
    }

    /**
     * Método para excluir conta de usuário
     */
    public function deleteAccount( Request $request ){
        
        $idUser = auth()->user()->id;
        
	$user = User::findOrFail($idUser);
        $user->status = 0;
        $user->update();
 
	// DB::table('users')->where('id', '=', $idUser)->delete();

        return Redirect::to('/');
        
    }

    /**
     * Método para alteração da imagem do perfil do usuário
     */
    public function setProfileImage( Request $request ){
                
        $user = new User();
        
        $idUser = auth()->user()->id;
        $user = User::findOrFail($idUser);
        
        // salvar imagem no banco -> https://blog.especializati.com.br/upload-de-arquivos-no-laravel-com-request/
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
        
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
        
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            
            // Faz o upload:
            $upload = $request->image->storeAs('users', $nameFile);
            
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

            $user->image = $nameFile;        
            // imagem ok          
        } else {
            $user->image = NULL;
        }

        $user->update();
        
        return Redirect::to('/client/perfil');

    }

    /**
     * Método de registro de novo recurso no banco de dados
     * @param request Requisições/informações do formulário de registro
     * @return Retorna pro dashboard do cliente
     */
    public function objectRegister( Request $request ){
        
        $objectContrl = new ObjectController();

        $objectContrl->register( $request, 0 );

        \Session::flash('mensagem_sucesso', 'O recurso foi cadastrado com sucesso! Por motivos de controle da plataforma, 
        todos os recursos passam por uma avaliação dos administradores. Você pode acompanhar o processo na coluna status abaixo, correspondente à linha do objeto!');
        return Redirect::to('/client/meus_objetos');

    }

    /**
     * Recupera lista de recursos cadastrados pelo usuário no banco de dados
     */
    public function objectListUser( ){
        
        // instancia de object
        $object = new Object();

        // recupera ID do usuario logado
        $idUser = auth()->user()->id;

        // recupera historico de OAs cadastradas
        $objects = $object->where([
            ['objects.status', 1],
            ['objects.id_user', $idUser],
        ])->paginate(10);
        
        return View('/client/client_myObjects', compact('objects'));

    }   


    /**
     * Ação de deletar objeto do banco de dados: apenas altera coluna status para 0
     * @param id_obj Objeto a ser excluído
     * @return Retorna para a página de visualização de reds (dashboard cliente)
     */
    public function objectDelete( $id_obj ){
        
        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->objectDelete( $id_obj );

        return Redirect::to('/client/meus_objetos');
        
    }

    /**
     * Mostrar detalhes dos recursos cadastrados
     * @param id_obj Identificador do objeto a ser detalhado
     * @return Retorna para a página de visualização de reds (dashboard cliente)
     */
    public function showObjectDetail( $id_obj ){
        
        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->showObjectDetail( $id_obj );

        return View('/client/client_objectDetail', $objects );
        
    }
       
    /**
     * Redireciona para a página de edição das informações de um recurso
     * @param id_obj Identificador do objeto a ser editado
     */
    public function objectRedirectEdit( $id_obj ){
    
        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->objectRedirectEdit( $id_obj );
    
        return View('/client/client_edit_form', $objects );
        
    }

    /**
     * Lista objetos salvos pelo usuário atualmente logado no sistema
     * @return Objetos salvos
     */
    public function listSaveObjects( ){
        
        // instancia de object
        $saved_object = new Saved_object();
        $logBook = new Log_book();
        
        // recupera ID do usuario logado
        $idUser = auth()->user()->id;

        $objects  = $saved_object->where([
                        ['objects.status', 1],
                        ['saved_objects.id_user', $idUser],
                    ])->join('objects', 'objects.id', '=', 'saved_objects.id_object')
                    ->paginate(4);
        $historic = $logBook->where('log_book.id_user', '=', $idUser)->get();
        
        return View('/client/client_initial', compact('objects', 'historic'));
        
    }
        
    /**
     * Remover recurso da lista de salvos
     * @param id_obj Identificador do recurso a ser removido
     */
    public function removeObjectSaved( $id_obj ){
        
        $saved = new saved_object();
        
        $saved = $saved->where([
            ['saved_objects.id_object', $id_obj],
            ['saved_objects.id_user', auth()->user()->id],
        ])->delete();

        return Redirect::to('dashboard');     
        
    }






    

}
