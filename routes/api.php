<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['artigo'=> 'API\ArtigoController']);
Route::apiResources(['categoria'=> 'API\CategoriaController']);
Route::apiResources(['recusar_pedido'=> 'API\operacoesController']);
Route::apiResources(['pedidos'=> 'API\PedidoController']);
Route::apiResources(['addUser'=> 'API\Auth\RegisterController']);
Route::apiResources(['vendas'=> 'API\VendasController']);
Route::apiResources(['dash'=> 'API\DashController']);
Route::apiResources(['foto'=> 'API\FotoController']);
Route::apiResources(['chart'=> 'API\ChartController']);
Route::apiResources(['utilizadores'=> 'API\UtilizadoresController']);
Route::apiResources(['fileupload'=> 'API\temporaryTestsController']);
Route::get('lockUser/{id}', 'API\UtilizadoresController@lockUser');
Route::get('unlockUser/{id}', 'API\UtilizadoresController@unlockUser');


  