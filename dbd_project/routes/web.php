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
Route::get('/', function(){
    return view('welcome');
});

//Route::get('/{user}', 'ControladorPaginas@say');

Route::get('/test/{name}', function ($name){
    return '<h1>Invocaste a '.$name.'...</h1>';
});

Route::get('/insertTest', function(){
    return view('userInsertTest');
});

Route::post('/insert', 'ControllerInsertTest@insert');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
