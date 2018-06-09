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
    return view('homepage');
});

Route::get('/admin', function(){
    return view('admin');
});

Route::post('/insert', 'ControllerInsertAdmin@insert');

Route::get('/insertar-vuelos', function(){
  return view('vuelo');
});


//Route::post('/usuarios/store', 'ControllerUsuarios@store');

Route::resource('vuelos', 'ControllerVuelos');
Route::resource('autos', 'ControllerAutos');
Route::resource('usuarios', 'ControllerUsuarios');
Route::resource('hoteles', 'ControllerHoteles');

Auth::routes();
