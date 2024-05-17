<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return 'Olá! Seja bem-vindo ao curso!';
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

/**
 * Rotas agrupadas
 */
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
}); 

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function(){
    echo "A rota acessada não existe. <a href=". route('site.index') .">Clique aqui</a> para ir para a página inicial.";
});

/**
 * Testando redirecionamento de rotas. Ao cair na 'rota1' o usuário será
 * redirecionado para a 'rota2'
 */
// Route::get('/rota1', function(){
//     return redirect()->route('site.rota2');
// })->name('site.rota1');

// Route::get('/rota2', function(){
//     echo "Rota 2";
// })->name('site.rota2');

// Route::redirect('/rota1','rota2');

/**
 * Rota 'contato' para recebimento de parâmetros para testes
 */
// Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
//     function(
//         string $nome = 'Informar nome',
//         string $categoria = 'Informar categoria',
//         string $assunto = 'Informar assunto',
//         string $mensagem = 'Informar mensagem'
//     ){
//         echo "<b>De: </b>" . $nome ."<br/>
//         <b>Categoria: </b>". $categoria ."<br/>
//         <b>Assunto: </b>". $assunto ."<br/>
//         <b>Mensagem: </b>" . $mensagem;
// });


/**
 * Rota 'contato' para recebimento de parâmetros para testes
 */
// Route::get('/contato/{nome}/{categoria_id}',
//     function(
//         string $nome = 'Informar nome',
//         int $categoria_id = 1 // 1 - Categoria "informação"
//     ){
//         echo "Estamos aqui: $nome - $categoria_id";
// })->where('nome', '[A-Za-z]+')->where('categoria_id', '[0-9]+');
