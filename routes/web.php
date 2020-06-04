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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/frontOfice', function () {
    return view('template');
});

Route::get('/enviar', function(){
    Mail::send('mail.corpo', ['curso' => 'Webmail'], function($m){
        $m->from(Auth::user()->email, Auth::user()->name);
        $m->subject('Teste de envio usando API mailgum');
        $m->to('exemplo@gmail.com');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

