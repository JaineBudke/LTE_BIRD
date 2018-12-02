<?php

namespace BIRD\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \BIRD\User;
use \BIRD\Object;
use \BIRD\saved_object;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{


    /**
     * Redireciona para a página inicial do sistema com as informações solicitadas
     */
    public function index(){
        // instancia de object
        $object = new Object();
        $saved_object = new saved_object();
        
        $users_count = User::count();
        $obj_count   = $object->where('status', '=', 1)->count();

        // recupera historico de OAs cadastradas
        $objects = $object->where([
                            ['objects.status', 1],
                            ['objects.requested', 0],
                            ])->orderBy('evaluation', 'desc')->paginate(4);


        if( Auth::check() ){
            $saved_object = $saved_object->where('id_user', '=', auth()->user()->id )->get();  
        }


        return view('initial', compact('users_count', 'obj_count', 'objects', 'saved_object'));
    }

    /**
     * Redireciona para a página de explorar recursos do sistema com as informações solicitadas
     */
    public function showExplore(){
        
        $object = new Object();
        $saved_object = new saved_object();
        $campoExp = '';
        $faixaEta = '';
        $tipoRec = '';
        $nivelAcess = '';

        // recupera historico de OAs cadastradas
        $objects = $object
                    ->where([
                        ['objects.status', 1],
                        ['objects.requested', 0],
                        ])
                    ->orderBy('evaluation', 'desc')->paginate(12);
        
        if( Auth::check() ){
            $saved_object = $saved_object->where('id_user', '=', auth()->user()->id )->get();  
        }

        $ensino = 'infantil';
        
        return view('explore', compact('objects', 'saved_object', 'campoExp', 
                                        'campoExp', 'faixaEta', 'tipoRec', 'nivelAcess', 'ensino'));

    }

}