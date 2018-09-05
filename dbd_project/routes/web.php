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
Route::get('/','HomeController@index');

//Route::post('/usuarios/store', 'ControllerUsuarios@store');
Route::group(['middleware'=> 'admin'], function (){
  Route::get('/aeropuertos/create','ControllerAeropuertos@create');
  Route::get('/aeropuertos/store','ControllerAeropuertos@store');
  Route::get('/aeropuertos/{id}/edit','ControllerAeropuertos@edit')->name('aeropuerto.edit');
  Route::post('/aeropuertos/{id}/update','ControllerAeropuertos@update')->name('aeropuerto.update');
  Route::get('/hoteles/create', 'ControllerHoteles@create');
  Route::get('/vuelos/create', 'ControllerVuelos@create');
  Route::get('/autos/create', 'ControllerAutos@create');
  Route::get('/habitaciones/{id}/edit', 'ControllerHabitaciones@edit')->name('habitacion.edit');
  Route::post('/habitaciones/{id}/update', 'ControllerHabitaciones@update')->name('habitacion.update');
  Route::get('/hoteles/{id}/edit', 'ControllerHoteles@edit')->name('hotel.edit');
  Route::patch('/hoteles/{id}/update', 'ControllerHoteles@update')->name('hotel.update');
  Route::get('/autos/{id}/edit', 'ControllerAutos@edit')->name('autos.edit');
  Route::patch('/autos/{id}/update', 'ControllerAutos@update')->name('autos.update');
  Route::get('/autos/{id}/destroy', 'ControllerAutos@destroy')->name('autos.destroy');
  Route::get('/auditoria', 'ControllerAuditoria@mostrarTablaAuditoria');
  Route::get('/actividades/create', 'ControllerActividades@create');
  Route::get('/fondos', 'ControllerTransacciones@fondos');
  Route::post('/fondos', 'ControllerTransacciones@addFondos')->name('fondos');
  //Route::get('/hoteles/{id_hotel}/create', function($id_hotel){
    //return view('habitaciones.insertar-habitacion')->with('id', $id_hotel);
  //});
  Route::get('/hoteles/{id_hotel}/create', 'ControllerHabitaciones@create');
});

Route::get('/paquetes', 'ControllerPaquete@index');
Route::post('/paquetes', 'ControllerPaquete@nuevoPaquete');
Route::post('/paquetes/1/{id}', 'ControllerPaquete@addVueloPaquete');
Route::post('/paquetes/2/{id}', 'ControllerPaquete@addVueloPaquete');

Route::get('/admin', ['middleware' => 'auth', 'uses' => 'ControllerRoles@administrar']);

//ROLES. Usar middleware para bloquear entrada despues de otorgarse el rol
Route::post('/admin/otorgar', 'ControllerRoles@otorgarRol');
Route::post('/admin/revocar', 'ControllerRoles@revocarRol');

//View methods
Route::get('/hoteles', 'ControllerHoteles@index');
Route::get('/vuelos', 'ControllerVuelos@index');

Route::get('/autos', 'ControllerAutos@index');
Route::get('/autos/{id_auto}', 'ControllerAutos@show');

//Post methods
Route::post('/autos/store', 'ControllerAutos@store');
Route::post('/hoteles/store', 'ControllerHoteles@store');

Route::get('/hoteles/buscarCiudad', 'ControllerHoteles@buscarHotelesPorCiudad')->name('hoteles.buscarPorCiudad');
Route::get('/hoteles/buscarPais', 'ControllerHoteles@buscarHotelesPorPais')->name('hoteles.buscarPorPais');
Route::get('/vuelos/buscar', 'ControllerVuelos@buscarVuelos')->name('vuelos.buscar');
Route::get('/vuelos/{id_vuelo}', 'ControllerVuelos@show');
Route::get('/hoteles/{id_hotel}', 'ControllerHoteles@show');

Route::post('/vuelos/store', 'ControllerVuelos@store');
Route::post('/habitaciones/store', 'ControllerHabitaciones@store');

//Traslados
Route::get('/create-traslado-aeropuertoHotel', 'ControllerTraslados@index_aeropuertoHotel');
Route::get('/create-traslado-hotelAeropuerto', 'ControllerTraslados@index_hotelAeropuerto');

//Actividades
Route::get('/actividades', 'ControllerActividades@index');
Route::get('/actividades/{id}', 'ControllerActividades@show');
Route::get('/actividades/create', 'ControllerActividades@create');
Route::post('/actividades/store', 'ControllerActividades@store');

Route::get('/carrito', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@mostrarCarrito']);

Route::post('/carrito/agregarHabitacion', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addHabitacionAlCarrito']);
Route::get('/carrito/agregarVuelo', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addVueloAlCarrito']);
Route::post('/carrito/agregarAuto', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addAutoAlCarrito']);
Route::post('/carrito/agregarActividad', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@addActividadAlCarrito']);

Route::get('/carrito/eliminar', ['middleware' => 'auth', 'uses' => 'ControllerCarrito@eliminarDelCarrito']);
Route::get('/comprar', ['middleware' => 'auth', 'uses' => 'ControllerTransacciones@comprar']);

Route::get('/historial', ['middleware' => 'auth', 'uses' => 'ControllerTransacciones@verHistorial']);

Auth::routes();

//Query Traslados
Route::get('/traslados/queryCiudad', 'ControllerTraslados@queryCiudad');
Route::get('/traslados/queryAeropuerto', 'ControllerTraslados@queryAeropuerto');
Route::get('/traslados/queryHotel', 'ControllerTraslados@queryHotel');
Route::get('/traslados/queryCoordenadas', 'ControllerTraslados@queryCoordenadas');
//Route::get('/traslados/calculoTraslado', 'ControllerTraslados@crear_traslado');


