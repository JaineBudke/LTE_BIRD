<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
 * Rotas das páginas principais do site
 */
// redirecionar para a página inicial do site
Route::get('/', 'HomeController@index');

// redirecionar para a página de explorar recursos
Route::get('/explore', 'HomeController@showExplore');

// redicionar para a página sobre
Route::get('/about', function () {
    return view('about');
});

// redirecionar para a página de contato
Route::get('/contact', function () {
    return view('contact');
});


// rotas automáticas de cadastro e login
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');


// Rotas disponíveis apenas para o perfil de administrador
Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    
    // redirecionar para a página inicial do dashboard da administração
    Route::get('/admin', 'AdminController@index');

    // redirecionar para a página de registro de recurso
    Route::get('/admin/cadastrar', function () {
        return view('/admin/register_form');
    });

    // listar todos os recursos ativos cadastrados no sistema
    Route::get('/admin/lista', 'AdminController@objectList');
    
    // registrar novo recurso no sistema
    Route::post('/objects/register', 'AdminController@objectRegister');    
    
    // redirecionar para a página de validação de recurso
    Route::get('/admin/avaliar', 'AdminController@redirectObjectValidate');

    // mostrar detalhes de recurso cadastrado
    Route::any('/admin/objectDetail/{id}', 'AdminController@showObjectDetail');
    
    // redirecionar para a edição do recurso
    Route::get('/admin/editarRecurso/{id}', 'AdminController@objectRedirectEdit');

    // atualizar edição do recurso no BD
    Route::post('/admin/editObject/{id}', 'ObjectController@objectEditAdmin');

    // excluir objeto
    Route::post('/admin/deletarObjeto/{id}', 'AdminController@objectDelete');
    
    // rotas para o admin rejeitar ou aceitar incluir recurso no banco de dados
    Route::post('/admin/aceitarRecurso/{id}', 'AdminController@objectAccept');
    Route::post('/admin/rejeitarRecurso/{id}', 'AdminController@objectReject');


    Route::any('/admin/objectDetailEvaluate/{id}', 'AdminController@showObjectDetailValidate');
    

});


// listar recursos cadastrados pelo usuário logado
Route::get('/client/meus_objetos', 'UserController@objectListUser');    

// redirecionar para o formulário de registro de recurso
Route::post('/client/objectRegister', function () {
    return view('client/client_register_form');
});

// registrar novo recurso no sistema 
Route::post('/client/register', 'UserController@objectRegister');    

// listar histórico de atividades do usuário logado
Route::get('/client/historico', 'UserController@userHistoric');

// redirecionar para página com informações do perfil
Route::get('/client/perfil', function () {
    return view('client/client_profile');
});

// redirecionar para a página de edição do perfil
Route::get('/client/editarPerfil', function () {
    return view('client/client_formProfile');
});

// editar perfil do usuario
Route::post('/client/editProfile', 'UserController@editProfile');

// deletar conta de usuario
Route::post('/client/deletarConta', 'UserController@deleteAccount');

// excluir objeto
Route::post('/client/deletarObjeto/{id}', 'UserController@objectDelete');

// redirecionar para a edição do recurso
Route::get('/client/editarRecurso/{id}', 'UserController@objectRedirectEdit');

// atualizar edição do recurso no BD
Route::post('/client/editObject/{id}', 'ObjectController@objectEdit');

// avaliar recurso
Route::post('/client/avaliarObjeto/{id}', 'ObjectController@evaluateObject');

// remover avaliacao de recurso
Route::post('/client/removeEval/{id}', 'ObjectController@removeEvalObject');

// buscar recursos ensino infantil (filtros)
Route::any('/searchInf', 'ObjectController@searchObjectInf');

// buscar recursos ensino fundamental I (filtros)
Route::any('/searchFund', 'ObjectController@searchObjectFund');

// salvar recurso na área pessoal
Route::post('/objects/save/{id}', 'ObjectController@saveObject');

// remover recurso salvo
Route::post('/client/removeSaved/{id}', 'UserController@removeObjectSaved');

// alterar imagem de perfil de usuário
Route::post('/client/editProfileImage', 'UserController@setProfileImage');

// listar recursos salvos pelo usuário logado
Route::get('/dashboard', 'UserController@listSaveObjects');

// mostrar detalhes dos recursos
Route::any('/client/objectDetail/{id}', 'UserController@showObjectDetail');


Route::get ( '/redirect/{service}', 'Auth/LoginController@redirect' );

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/privacy', function () {
    return view('privacy');
});


// Social login providers...
Route::get('/provider/{provider}', 'Auth\LoginController@redirectToProvider')->name('redirectToProvider');
Route::get('/provider/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

