<?php
use App\Http\Middleware\CheckAdmin;
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


//Route::post('/usuarios/store', 'ControllerUsuarios@store');
Route::group(['middleware'=> 'admin'], function (){
  Route::get('/hoteles/create', 'ControllerHoteles@create');
  Route::get('/vuelos/create', 'ControllerVuelos@create');
  Route::get('/autos/create', 'ControllerAutos@create');
  //Route::get('/hoteles/{id_hotel}/create', function($id_hotel){
    //return view('habitaciones.insertar-habitacion')->with('id', $id_hotel);
  //});
  Route::get('/hoteles/{id_hotel}/create', 'ControllerHabitaciones@create');
});

//View methods
Route::get('/hoteles', 'ControllerHoteles@index');
Route::get('/hoteles/{id_hotel}', 'ControllerHoteles@show');
Route::get('/vuelos', 'ControllerVuelos@index');
Route::get('/vuelos/{id_vuelo}', 'ControllerVuelos@show');
Route::get('/autos', 'ControllerAutos@index');
Route::get('/autos/{id_auto}', 'ControllerAutos@show');

//Post methods
Route::post('/autos/store', 'ControllerAutos@store');
Route::post('/hoteles/store', 'ControllerHoteles@store');
Route::post('/vuelos/store', 'ControllerVuelos@store');
Route::post('/habitaciones/store', 'ControllerHabitaciones@store');

Auth::routes();
