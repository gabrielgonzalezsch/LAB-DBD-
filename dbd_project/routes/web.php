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
  Route::get('/habitaciones/{id}/edit', 'ControllerHabitaciones@edit')->name('habitacion.edit');
  Route::post('/habitaciones/{id}/update', 'ControllerHabitaciones@update')->name('habitacion.update');
  Route::get('/hoteles/{id}/edit', 'ControllerHoteles@edit')->name('hotel.edit');
  Route::patch('/hoteles/{id}/update', 'ControllerHoteles@update')->name('hotel.update');
  Route::get('/auditoria', 'ControllerAuditoria@mostrarTablaAuditoria');
  Route::get('/actividades/create', 'ControllerActividades@create');
  //Route::get('/hoteles/{id_hotel}/create', function($id_hotel){
    //return view('habitaciones.insertar-habitacion')->with('id', $id_hotel);
  //});
  Route::get('/hoteles/{id_hotel}/create', 'ControllerHabitaciones@create');
});

Route::get('/admin', ['middleware' => 'auth', 'uses' => 'ControllerRoles@administrar']);

//ROLES. Usar middleware para bloquear entrada despues de otorgarse el rol
Route::post('/admin/otorgar', 'ControllerRoles@otorgarRol');
Route::post('/admin/revocar', 'ControllerRoles@revocarRol');

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

Route::get('/traslados', 'ControllerTraslados@index');
Route::get('/traslados/create', 'ControllerTraslados@create');
Route::post('/traslados/store', 'ControllerTraslados@store');

Route::get('/carrito', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@mostrarCarrito']);

Route::post('/carrito/agregarHabitacion', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addHabitacionAlCarrito']);
Route::get('/carrito/agregarVuelo', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addVueloAlCarrito']);
Route::post('/carrito/agregarAuto', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addAutoAlCarrito']);

Route::get('/carrito/eliminar', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@eliminarDelCarrito']);
Route::get('/comprar', ['middleware' => 'auth', 'uses' => 'ControllerTransacciones@comprar']);

Route::get('/historial', ['middleware' => 'auth', 'uses' => 'ControllerTransacciones@verHistorial']);

Auth::routes();
