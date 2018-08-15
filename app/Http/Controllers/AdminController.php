<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use \App\Log_book;
use DB;
use \App\User;
use \App\Http\Controllers\ObjectController;
use App\Object;
use App\Object_type;
use App\Component;
use App\Age_range;
use App\thematic_unit;

class AdminController extends Controller
{

    /**
     * Método de redirecionamento para a área pessoal da administração
     */
    public function index( ){

        // instancia de log_book
        $logBook = new Log_book();

        // recupera historico de atividades efetuadas
        $activities = $logBook->join('users', 'users.id', '=', 'log_book.id_user')->orderBy('log_book.created_at', 'desc')->paginate(10);
        
        return View('\admin\admin_initial', compact('activities'));

    }

    /**
     * Método de registro de novo recurso no banco de dados
     * @param request Requisições/informações do formulário de registro
     * @return Retorna pro dashboard do admin
     */
    public function objectRegister( Request $request ){

        $objectContrl = new ObjectController();

        $objectContrl->register( $request, 1 );

        \Session::flash('mensagem_sucesso', 'Recurso cadastrado com sucesso!');
        return Redirect::to('admin');

    }

    /**
     * Recupera lista de recursos cadastrados no banco de dados
     * @return Retorna para a página de visualização de reds (dashboard admin)
     */
    public function objectList( ){

        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->objectList();

        return View('\admin\list', compact('objects'));
        
    }

    /**
     * Ação de deletar objeto do banco de dados: apenas altera coluna status para 0
     * @param id_obj Objeto a ser excluído
     * @return Retorna para a página de visualização de reds (dashboard admin)
     */
    public function objectDelete( $id_obj ){

        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->objectDelete( $id_obj );

        return Redirect::to('/admin/lista');
        
    }

    /**
     * Mostrar detalhes dos recursos cadastrados
     * @param id_obj Identificador do objeto a ser detalhado
     * @return Retorna para a página de visualização de reds (dashboard admin)
     */
    public function showObjectDetail( $id_obj ){

        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->showObjectDetail( $id_obj );

        return View('/admin/admin_objectDetail', $objects );
        
    }

    /**
     * Redireciona para a página de edição das informações de um recurso
     * @param id_obj Identificador do objeto a ser editado
     */
    public function objectRedirectEdit( $id_obj ){
    
        $objectContrl = new ObjectController();
        
        $objects = $objectContrl->objectRedirectEdit( $id_obj );
    
        return View('/admin/admin_edit_form', $objects );
        
    }

    /**
     * Redirecionamento para página de recursos a serem aceitos/rejeitados
     */
    public function redirectObjectValidate(){
        
        $objects = new Object();

        $objects = $objects
            ->leftjoin('users', 'objects.id_user', '=', 'users.id')
            ->select('objects.*', 'users.name')
            ->where([
                ['objects.status', 1],
                ['objects.requested', 1],
            ])
            ->paginate(10);
    

        return View('admin/admin_evaluate', compact('objects'));
    }

    /**
     * Aceitar recurso submetido por usuário
     * @param id_obj Identificador do recurso a ser aceito
     */
    public function objectAccept( $id_obj ){
        
        $objects = new Object();

        $object = Object::findOrFail($id_obj);
        
        $object->requested = 0;
        
        $object->update();

        return Redirect::to('admin/lista');        

    }

    /**
     * Rejeitar recurso submetido por usuário
     * @param id_obj Identificador do recurso a ser rejeitado
     */
    public function objectReject( $id_obj ){
        
        $objects = new Object();
        
        $object = Object::findOrFail($id_obj);
        
        $object->requested = 2;
        
        $object->update();

        return Redirect::to('admin/lista');     
        
    }

    /**
     * Mostra detalhes de um recurso que está para ser analisado
     * @param id_obj Identificador do objeto a ser detalhado
     */
    public function showObjectDetailValidate( $id_obj ){
        
        // instancia de object
        $object  = new Object();
        $ageRange = new Age_range();
        $components = new Component();
        $objTypes = new Object_type();
        $thematics = new thematic_unit();
        
        $object = Object::findOrFail($id_obj);
        $ageRange = $ageRange->where('age_range.id_object', '=', $id_obj)->get();
        $components = $components->where('components.id_object', '=', $id_obj)->get();
        $objTypes = $objTypes->where('object_types.id_object', '=', $id_obj)->get();
        
        if( $object->educationLevel == "Ensino Fundamental 1" ){
            $thematics = $thematics->where('thematic_unit.id_object', '=', $id_obj)->get();
        }

        return View('/admin/admin_objectDetailEvaluate', compact('object', 'ageRange', 'components', 'objTypes', 'thematics'));
        
    }


}
