<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Object;
use App\Object_type;
use App\Component;
use App\Age_range;
use App\Log_book;
use App\Saved_object;
use App\thematic_unit;
use App\evaluation_object;

use DB;


class ObjectController extends Controller
{

    /**
     * Registra as informações principais de um recurso
     * @param request Informações do formulário
     * @param admin Informação sobre quem solicita o cadastro (admin - 1 - ou cliente - 0 -)
     * @link https://blog.especializati.com.br/upload-de-arquivos-no-laravel-com-request/
     */
    public function standardRegister( Object $object, Request $request, $admin ){

        $object->title = $request->get('title'); 
        
        // salvar imagem no banco (link)
        $nameFile = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
        
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
        
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            
            // Faz o upload:
            $upload = $request->image->storeAs('objects', $nameFile);
            //$upload = $request->image->store('objects');

            
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

            $object->image = $nameFile;        
            // imagem ok          
        } else {
            $object->image = '';
        }

        $object->link = $request->get('link'); 
        $object->educationLevel = $request->get('nivelEnsino'); 
        $object->description = $request->get('description');         
        $object->acessLevel = $request->get('nivelAcess'); 
        $object->evaluation = 0; 
        $object->numberEvaluations = 0; 

        if( $admin == 1 ){ // recurso diretamente aprovado 
            $object->requested = 0;
        } else { // recurso precisa de avaliação dos administradores para ficar disponivel
            $object->requested = 1;
        }

        $object->status = 1; 
        
        $object->id_user = auth()->user()->id; 

        $object->save();

    }

    /**
     * Registra o(s) tipo(s) do recurso cadastrado
     * @param request Informações do formulário
     */
    public function typeRegister( Object $object, Request $request ){

        // array com os tipos
        $tipos = array("animacao", "audiovisual", "ebook", "fotografia", 
        "ilustracao", "infografico", "jogo", "podcast", 
        "realidadeAumentada", "realidadeVirtual", "simulacao");

        // percorre array e verifica quais foram selecionados
        for( $i = 0 ; $i < 11 ; $i++ ){
            if( $request->get('recurso'.$i) == true ){ // checkbox -> checked

                // cria nova associacao de tipo de objeto e add no BD
                $obtype = new Object_type();
                $obtype->type = $tipos[$i];
                $obtype->id_object = $object->id;
                
                $obtype->save();

            }
        }

    }


    /**
     * Registra as informações específicas dos objetos correspondentes ao ensino infantil
     * @param request Informações do formulário 
     */
    public function childhoodEducationRegister( Object $object, Request $request ){
        
        // salvando os campos de experiencia
        for( $i = 1 ; $i <= 5 ; $i++ ){
            if( $request->get('campo'.$i) == true ){ // checkbox -> checked
            
                // cria nova associacao de campo de exp de objeto e add no BD
                $obcampo = new Component();
                $obcampo->component = $request->get('campo'.$i);
                $obcampo->id_object = $object->id;
                
                $obcampo->save();

            }
        }

        // salvando a faixa etária
        for( $i = 1 ; $i <= 2 ; $i++ ){
            if( $request->get('faixaetaria'.$i) == true ){ // checkbox -> checked
                
                // cria nova associacao de campo de exp de objeto e add no BD
                $faixa = new Age_range();
                $faixa->age = $request->get('faixaetaria'.$i);
                $faixa->id_object = $object->id;
                
                $faixa->save();

            }
        }

    }
        

    /**
     * Registra as informações específicas dos objetos correspondentes ao ensino fundamental I
     * @param request Informações do formulário 
     */
    public function elementarySchoolRegister( Object $object, Request $request ){
        
        // salvando os componentes curriculares
        for( $i = 1 ; $i <= 7 ; $i++ ){
            if( $request->get('comp'.$i) == true ){ // checkbox -> checked
            
                // cria nova associacao de componente curricular de objeto e add no BD
                $obcampo = new Component();
                $obcampo->component = $request->get('comp'.$i);
                $obcampo->id_object = $object->id;
                
                $obcampo->save();

            }
        }

        // salvando ano escolar
        for( $i = 1 ; $i <= 5 ; $i++ ){
            if( $request->get('ano'.$i) == true ){ // checkbox -> checked
                
                // cria nova associacao de ano escolar do objeto e add no BD
                $faixa = new Age_range();
                $faixa->age = $request->get('ano'.$i);
                $faixa->id_object = $object->id;
                
                $faixa->save();

            }
        }

        // salvando unidade tematica
        for( $i = 1 ; $i <= 55 ; $i++ ){
            if( $request->get('unid'.$i) == true ){ // checkbox -> checked
                
                // cria nova associacao de ano escolar do objeto e add no BD
                $them = new thematic_unit();
                $them->thematic = $request->get('unid'.$i);
                $them->id_object = $object->id;
                
                $them->save();

            }
        }

    }
        

    /**
     * Método de registro de novo recurso no banco de dados
     * @param request Requisições/informações do formulário de registro
     * @param admin Informação sobre quem solicita o cadastro (admin - 1 - ou cliente - 0 -)
     */
    public function register( Request $request, $admin ){
        
        // salvando informações padrão do objeto
        $object = new Object();

        ObjectController::standardRegister( $object, $request, $admin );
        ObjectController::typeRegister( $object, $request );

        if($request->get('nivelEnsino') == "Ensino Infantil"){
            
            ObjectController::childhoodEducationRegister( $object, $request );

        }
        if($request->get('nivelEnsino') == "Ensino Fundamental 1"){

            ObjectController::elementarySchoolRegister( $object, $request );

        }
        
        // atualizando tabela log_book
        $logbook = new Log_book();
        $logbook->event = "cadastro de RED #".$object->id;
        $logbook->id_user = auth()->user()->id; 
        $logbook->id_object = $object->id;
        $logbook->save();

    }


    /**
     * Recupera lista de recursos cadastrados no banco de dados
     * @return Lista de todos os recursos
     */
    public function objectList( ){
        
        // instancia de object
        $object = new Object();

        // recupera historico de OAs cadastradas
        $objects = $object
        ->leftjoin('users', 'objects.id_user', '=', 'users.id')
        ->select('objects.*', 'users.name')
        ->where([
            ['objects.status', 1],
            ['objects.requested', 0],
        ])
        ->paginate(10);
        
        return $objects;

    }  

    /**
     * Ação de deletar objeto do banco de dados: apenas altera coluna status para 0
     * @param id_obj Objeto a ser excluído
     */
    public function objectDelete( $id_obj ){
        
        $object = Object::findOrFail($id_obj);
        $object->status = 0;
        $object->update();

    }

    /**
     * Mostrar detalhes dos recursos cadastrados
     * @param id_obj Identificador do objeto a ser detalhado
     * @return Retorna objetos e informações encontradas de forma compactada
     */
    public function showObjectDetail( $id_obj ){
        
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

        return compact('object', 'ageRange', 'components', 'objTypes', 'thematics');
        
    }


    /**
     * Redireciona para a página de edição das informações de um recurso
     * @param id_obj Identificador do objeto a ser editado
     * @return Retorna objetos e informações solicitadas de forma compactada
     */
    public function objectRedirectEdit( $id_obj ){
        
        // instancia de object
        $object  = new Object();
        $ageRange = new Age_range();
        $components = new Component();
        $objTypes = new Object_type();
        $thematics = new thematic_unit();
        
        // recuperar informações do objeto do banco de dados
        $object = Object::findOrFail($id_obj);
        $ageRange = $ageRange->where('age_range.id_object', '=', $id_obj)->get();
        $components = $components->where('components.id_object', '=', $id_obj)->get();
        $objTypes = $objTypes->where('object_types.id_object', '=', $id_obj)->get();

        if( $object->educationLevel == "Ensino Fundamental 1" ){
            $thematics = $thematics->where('thematic_unit.id_object', '=', $id_obj)->get();
        }
        
        return compact('object', 'ageRange', 'components', 'objTypes', 'thematics');

    }


    /**
     * Ação de salvar recurso: associa o id do usuário ao id do recurso
     * @param id_obj Identificador do objeto a ser salvo
     */
    public function saveObject( $id_obj ){
        
        if (Auth::check()){
            
            $saved_object = new Saved_object();
            
            $saved_object->id_object = $id_obj;

            // recupera ID do usuario logado
            $idUser = auth()->user()->id;
            
            $saved_object->id_user = $idUser;

            $saved_object->save();


            \Session::flash('mensagem_sucesso', 'O recurso foi salvo com sucesso!');
            return Redirect::to('/explore');

        } else {

            \Session::flash('mensagem_erro', 'Você precisa efetuar login para salvar um recurso!');            
            return Redirect::to('/explore');

        }

    }


    /**
     * Avaliar/dar nota ao recurso (sistema com estrelas)
     * @param id_obj Identificador do recurso a ser avaliado
     * @param request Nota dada ao recurso
     */
    public function evaluateObject( $id_obj, Request $request ){
          
        $object = new Object();
        $evaluate = new evaluation_object();

        // recupera nova avaliacao do usuario
        $newEval = $request->get('fb');
        
        $evaluate->evaluation = $newEval;
        $evaluate->id_user = auth()->user()->id; 
        $evaluate->id_object = $id_obj;
        $evaluate->save();
    

        $object = Object::findOrFail($id_obj);
    
        // recupera informações do objeto
        $eval   = $object->evaluation;
        $number = $object->numberEvaluations;

        $attEval = 0;

        // valor de avaliação atualizado
        if( $number == 0 ){ // se não tiver nenhuma avaliação ainda
            $attEval = $newEval;
        } else {
            $attEval = $eval+$newEval;
        }

        // atualiza no banco de dados
        $object->numberEvaluations = ($number+1);
        $object->evaluation = $attEval;

        // salva alterações
        $object->update();


        // atualizando tabela log_book
        $logbook = new Log_book();
        $logbook->event = "Avaliação: Nota ".$newEval." ao Recurso #".$object->id;
        $logbook->id_user = auth()->user()->id; 
        $logbook->id_object = $object->id;
        $logbook->save();
        

        \Session::flash('mensagem_sucesso', 'O recurso foi avaliado com sucesso!');
        return Redirect::to('/dashboard');

    }

    /**
     * Retirar avaliação dada anteriormente a um recurso
     * @param id_obj Identificador do recurso ao qual será retirada a avaliação
     */
    public function removeEvalObject( $id_obj ){
        
        $objects = new Object();
        $evaluations = new evaluation_object();
        

        $evaluations = $evaluations->where([
            ['object_evaluation.id_object', $id_obj],
            ['object_evaluation.id_user', auth()->user()->id],
        ])->get();

        $attEval = $evaluations[0]->evaluation;

        
        $object = Object::findOrFail($id_obj);

        $number = $object->numberEvaluations;

    
        // retirar 1 de numberEvaluations
        $object->numberEvaluations = $number - 1;

        $eval = $object->evaluation;        

        // retirar a avaliação da contagem
        $objects->evaluation = $eval - $attEval;

        
        $objects->update();


        // excluir linha da tabela object_evaluation
        $evaluations = $evaluations[0]->where([
            ['object_evaluation.id_object', $id_obj],
            ['object_evaluation.id_user', auth()->user()->id],
        ])->delete();

        return Redirect::to('dashboard');     

    }

    /**
     * Busca recursos da educação infantil de acordo com filtros
     * @param request Filtros acionados para a busca
     */
    public function searchObjectInf( Request $request ){
        
        $objects = new Object();
        $saved_object = new saved_object();
        
        // recuperando valores dos filtros
        $campoExp   = $request->get('campoExp');
        $faixaEta   = $request->get('faixaEtaria');
        $tipoRec    = $request->get('tipoRecurso');
        $nivelAcess = $request->get('nivelAcess');
        

        $whereCampoEx    = "<>";
        $whereFaixaEta   = "<>";
        $whereTipoRec    = "<>";
        $whereNivelAcess = "<>";

        if( $campoExp != "campo" ){
            $whereCampoEx = "=";
        }

        if( $faixaEta != "faixa" ){
            $whereFaixaEta = "=";
        }

        if( $tipoRec != "tipo" ){
            $whereTipoRec = "=";
        }

        if( $nivelAcess != "nivel" ){
            $whereNivelAcess = "=";
        }
        
        
        $objects = DB::table('objects') 
                        ->join('components', 'objects.id', '=', 'components.id_object')
                        ->join('age_range', 'objects.id', '=', 'age_range.id_object')
                        ->join('object_types', 'objects.id', '=', 'object_types.id_object')
                        ->select('objects.*')
                        ->groupBy('objects.id')
                        ->where([
                            ['objects.status', 1],
                            ['objects.requested', 0],
                            ['educationLevel', 'Ensino Infantil'],
                            ['objects.acessLevel', $whereNivelAcess, $nivelAcess],
                            ['components.component', $whereCampoEx, $campoExp],
                            ['object_types.type', $whereTipoRec, $tipoRec],    
                            ['age_range.age', $whereFaixaEta, $faixaEta],
                        ])
                        ->paginate(10);

        if( Auth::check() ){
            $saved_object = $saved_object->where('id_user', '=', auth()->user()->id )->get();  
        }  

        $ensino = 'infantil';
        
        return View('explore', compact('objects', 'saved_object', 'campoExp', 'faixaEta', 'tipoRec', 'nivelAcess', 'ensino'));
        
    }


    /**
     * Busca recursos do ensino fundamental de acordo com filtros
     * @param request Filtros acionados para a busca
     */
    public function searchObjectFund( Request $request ){
        
        $objects = new Object();
        $saved_object = new saved_object();
        
        // recuperando valores dos filtros
        $compCurr       = $request->get('compCurr');
        $ano            = $request->get('year');
        $tipoRecFund    = $request->get('tipoRecursoFund');
        $nivelAcessFund = $request->get('nivelAcessFund');
        $unidTem        = $request->get('unidTem');


        $whereCompCurr    = "<>";
        $whereAno         = "<>";
        $whereTipoRec     = "<>";
        $whereNivelAcess  = "<>";
        $whereUnidTema    = "<>";


        if( $compCurr != "comp" ){
            $whereCompCurr = "=";
        }

        if( $ano != "ano" ){
            $whereAno = "=";
        }

        if( $tipoRecFund != "tipoFund" ){
            $whereTipoRec = "=";
        }

        if( $nivelAcessFund != "nivelFund" ){
            $whereNivelAcess = "=";
        }

        if( $unidTem != "unid" ){
            $whereUnidTema = "=";
        }


        
        $objects = DB::table('objects') 
                    ->join('components', 'objects.id', '=', 'components.id_object')
                    ->join('age_range', 'objects.id', '=', 'age_range.id_object')
                    ->join('object_types', 'objects.id', '=', 'object_types.id_object')
                    ->join('thematic_unit', 'objects.id', '=', 'thematic_unit.id_object')
                    ->select('objects.*')
                    ->groupBy('objects.id')
                    ->where([
                        ['objects.status', 1],
                        ['objects.requested', 0],
                        ['educationLevel', 'Ensino Fundamental 1'],
                        ['objects.acessLevel', $whereNivelAcess, $nivelAcessFund],
                        ['components.component', $whereCompCurr, $compCurr],
                        ['object_types.type', $whereTipoRec, $tipoRecFund],    
                        ['age_range.age', $whereAno, $ano],
                        ['thematic_unit.thematic', $whereUnidTema, $unidTem],
                    ])
                    ->paginate(10);

        if( Auth::check() ){
            $saved_object = $saved_object->where('id_user', '=', auth()->user()->id )->get();  
        }  
            
        $ensino = 'fundamental';

        return View('explore', compact('objects', 'saved_object', 'tipoRecFund', 'nivelAcessFund',
                                        'compCurr', 'ano', 'unidTem', 'ensino'));

    }






    
    /**
     * MÉTODOS ADMIN
     */

    /**
     * Atualiza recurso com informações de edição
     * @param id_obj Identificador do recurso a ser atualizado
     * @param request Informações de edição
     */
    public function objectEditAdmin( $id_obj, Request $request ){
        
        // salvando informações padrão do objeto
        $object = new Object();

        $object = Object::findOrFail($id_obj);
        
        $object->title = $request->get('title'); 

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
            $upload = $request->image->storeAs('objects', $nameFile);
            //$upload = $request->image->store('objects');

            
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

                         
            $object->image = $nameFile;        
            // imagem ok   

        }
        
        $object->link = $request->get('link'); 
        $object->educationLevel = $request->get('nivelEnsino'); 
        $object->description = $request->get('description');
        $object->acessLevel = $request->get('nivelAcess'); 

        $object->update();


        
        // salvando os tipos do objeto
        // array com os tipos
        $tipos = array("animacao", "audiovisual", "ebook", "fotografia", 
                        "ilustracao", "infografico", "jogo", "podcast", 
                        "realidadeAumentada", "realidadeVirtual", "simulacao");
        

        // deletando linhas do object_types associados ao object
        DB::table('object_types')->where('id_object', '=', $id_obj)->delete();

        // salvando os tipos após atualização
        for( $i = 0 ; $i < 11 ; $i++ ){
            if( $request->get('recurso'.$i) == true ){ // checkbox -> checked
                
                $obtype = new Object_type();                                      
                
                $obtype->type = $tipos[$i];
                $obtype->id_object = $object->id;
                
                $obtype->save();
            
            }
        }

        // deletando linhas do components associados ao object
        DB::table('components')->where('id_object', '=', $id_obj)->delete();
        // deletando linhas do age_range associados ao object
        DB::table('age_range')->where('id_object', '=', $id_obj)->delete();
        // deletando linhas do thematic_unit associados ao object
        DB::table('thematic_unit')->where('id_object', '=', $id_obj)->delete();
                
        if($request->get('nivelEnsino') == "Ensino Infantil"){
            // salvando os campos de experiencia
            for( $i = 1 ; $i <= 5 ; $i++ ){
                if( $request->get('campo'.$i) == true ){ // checkbox -> checked
                
                    // cria nova associacao de campo de exp de objeto e add no BD
                    $obcampo = new Component();
                    $obcampo->component = $request->get('campo'.$i);
                    $obcampo->id_object = $object->id;
                    
                    $obcampo->save();

                }
            }

            // salvando a faixa etária
            for( $i = 1 ; $i <= 2 ; $i++ ){
                if( $request->get('faixaetaria'.$i) == true ){ // checkbox -> checked
                    
                    // cria nova associacao de campo de exp de objeto e add no BD
                    $faixa = new Age_range();
                    $faixa->age = $request->get('faixaetaria'.$i);
                    $faixa->id_object = $object->id;
                    
                    $faixa->save();

                }
            }
        }
        if($request->get('nivelEnsino') == "Ensino Fundamental 1"){
            
            // salvando os componentes curriculares
            for( $i = 1 ; $i <= 7 ; $i++ ){
                if( $request->get('comp'.$i) == true ){ // checkbox -> checked
                
                    // cria nova associacao de componente curricular de objeto e add no BD
                    $obcampo = new Component();
                    $obcampo->component = $request->get('comp'.$i);
                    $obcampo->id_object = $object->id;
                    
                    $obcampo->save();

                }
            }

            // salvando ano escolar
            for( $i = 1 ; $i <= 5 ; $i++ ){
                if( $request->get('ano'.$i) == true ){ // checkbox -> checked
                    
                    // cria nova associacao de ano escolar do objeto e add no BD
                    $faixa = new Age_range();
                    $faixa->age = $request->get('ano'.$i);
                    $faixa->id_object = $object->id;
                    
                    $faixa->save();

                }
            }

            // salvando unidade tematica
            for( $i = 1 ; $i <= 55 ; $i++ ){
                if( $request->get('unid'.$i) == true ){ // checkbox -> checked
                    
                    // cria nova associacao de ano escolar do objeto e add no BD
                    $them = new thematic_unit();
                    $them->thematic = $request->get('unid'.$i);
                    $them->id_object = $object->id;
                    
                    $them->save();

                }
            }

        }


        // atualizando tabela log_book
        $logbook = new Log_book();
        $logbook->event = "Atualização da RED #".$object->id;
        $logbook->id_user = auth()->user()->id; 
        $logbook->id_object = $object->id;
        $logbook->save();
        
        \Session::flash('mensagem_sucesso', 'O recurso foi atualizado com sucesso!');
        return Redirect::to('/admin/lista');

    }


    /**
     * Atualiza recurso com informações de edição
     * @param id_obj Identificador do recurso a ser atualizado
     * @param request Informações de edição
     */
    public function objectEdit( $id_obj, Request $request ){
        
        // salvando informações padrão do objeto
        $object = new Object();

        $object = Object::findOrFail($id_obj);
        
        $object->title = $request->get('title'); 

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
            $upload = $request->image->storeAs('objects', $nameFile);
            //$upload = $request->image->store('objects');

            
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();

            $object->image = $nameFile;        
            // imagem ok          
        }

        
        $object->link = $request->get('link'); 
        $object->educationLevel = $request->get('nivelEnsino'); 
        $object->description = $request->get('description');
        $object->acessLevel = $request->get('nivelAcess'); 

        $object->update();


        
        // salvando os tipos do objeto
        // array com os tipos
        $tipos = array("animacao", "audiovisual", "ebook", "fotografia", 
                        "ilustracao", "infografico", "jogo", "podcast", 
                        "realidadeAumentada", "realidadeVirtual", "simulacao");
        

        // deletando linhas do object_types associados ao object
        DB::table('object_types')->where('id_object', '=', $id_obj)->delete();

        // salvando os tipos após atualização
        for( $i = 0 ; $i < 11 ; $i++ ){
            if( $request->get('recurso'.$i) == true ){ // checkbox -> checked
                
                $obtype = new Object_type();                                      
                
                $obtype->type = $tipos[$i];
                $obtype->id_object = $object->id;
                
                $obtype->save();
            
            }
        }

        // deletando linhas do components associados ao object
        DB::table('components')->where('id_object', '=', $id_obj)->delete();
        // deletando linhas do age_range associados ao object
        DB::table('age_range')->where('id_object', '=', $id_obj)->delete();
        // deletando linhas do thematic_unit associados ao object
        DB::table('thematic_unit')->where('id_object', '=', $id_obj)->delete();
                
        if($request->get('nivelEnsino') == "Ensino Infantil"){
            // salvando os campos de experiencia
            for( $i = 1 ; $i <= 5 ; $i++ ){
                if( $request->get('campo'.$i) == true ){ // checkbox -> checked
                
                    // cria nova associacao de campo de exp de objeto e add no BD
                    $obcampo = new Component();
                    $obcampo->component = $request->get('campo'.$i);
                    $obcampo->id_object = $object->id;
                    
                    $obcampo->save();

                }
            }

            // salvando a faixa etária
            for( $i = 1 ; $i <= 2 ; $i++ ){
                if( $request->get('faixaetaria'.$i) == true ){ // checkbox -> checked
                    
                    // cria nova associacao de campo de exp de objeto e add no BD
                    $faixa = new Age_range();
                    $faixa->age = $request->get('faixaetaria'.$i);
                    $faixa->id_object = $object->id;
                    
                    $faixa->save();

                }
            }
        }
        if($request->get('nivelEnsino') == "Ensino Fundamental 1"){
            
            // salvando os componentes curriculares
            for( $i = 1 ; $i <= 7 ; $i++ ){
                if( $request->get('comp'.$i) == true ){ // checkbox -> checked
                
                    // cria nova associacao de componente curricular de objeto e add no BD
                    $obcampo = new Component();
                    $obcampo->component = $request->get('comp'.$i);
                    $obcampo->id_object = $object->id;
                    
                    $obcampo->save();

                }
            }

            // salvando ano escolar
            for( $i = 1 ; $i <= 5 ; $i++ ){
                if( $request->get('ano'.$i) == true ){ // checkbox -> checked
                    
                    // cria nova associacao de ano escolar do objeto e add no BD
                    $faixa = new Age_range();
                    $faixa->age = $request->get('ano'.$i);
                    $faixa->id_object = $object->id;
                    
                    $faixa->save();

                }
            }

            // salvando unidade tematica
            for( $i = 1 ; $i <= 55 ; $i++ ){
                if( $request->get('unid'.$i) == true ){ // checkbox -> checked
                    
                    // cria nova associacao de ano escolar do objeto e add no BD
                    $them = new thematic_unit();
                    $them->thematic = $request->get('unid'.$i);
                    $them->id_object = $object->id;
                    
                    $them->save();

                }
            }

        }


        // atualizando tabela log_book
        $logbook = new Log_book();
        $logbook->event = "Atualização da RED #".$object->id;
        $logbook->id_user = auth()->user()->id; 
        $logbook->id_object = $object->id;
        $logbook->save();
        
        \Session::flash('mensagem_sucesso', 'O recurso foi atualizado com sucesso!');
        return Redirect::to('/client/meus_objetos');

    }



}
