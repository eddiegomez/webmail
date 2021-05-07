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

Route::get('/','frontOfficeController@index');

Route::get('/artigos','operationsController@index');

//Route::apiResources(['enviar'=> 'API\EmailController']);

Route::get('/enviar', function(){
    Mail::send('mail.corpo', ['empresa' => 'Marie Sex Shop EI'], function($m){
        $m->from('edsongomex@gmail.com', 'Edson Gomes');
        $m->to('mariesexshopp@gmail.com');
    });
});

//Route::apiResources(['checkout'=> 'API\ChekoutController']);

Route::apiResources(['foto'=> 'carrinhoController']);

Route::apiResources(['test'=> 'testesController']);

Route::apiResources(['/pagamento'=> 'pagamentosController']);

Route::apiResources(['/encomendar'=>'pedidoController']);

Route::get('/categ/{idcategoria}','categController@show');

Route::get('/checkout','chekoutController@index');

//Route::get('/pagamento','pagamentosController@store');

Route::get('/carrinho','carrinhoController@index');

Route::get('/dynamic_pdf/{idrequisicao}','DynamicPDFController@show');

Route::get('/dynamic_pdf/pdf/{idrequisicao}','DynamicPDFController@pdf');

Route::get('/meus_pedidos','DynamicPDFController@meus_pedidos');

Auth::routes();

Route::get('/produto/{idproduto}','operationsController@show');

/*Route::get('/home', 'HomeController@index')->name('home');*/
//Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/home', function (){
        if(Auth::user()->tipo_utilizador_idtipo_utilizador == 1 && Auth::user()->estado == 1) {
            $min = DB::table('artigo')->min('quantidade');
            return view('home',['min'=>$min]);
        }else{
            /*session_abort();
            return "conta bloqueada";*/
        }
        if(Auth::user()->tipo_utilizador_idtipo_utilizador == 2 && Auth::user()->estado == 1) {
            return redirect(url("/meus_pedidos"));
        }else{
            /*session_abort();
            return "conta bloqueada";*/
        }
        
    });

});



