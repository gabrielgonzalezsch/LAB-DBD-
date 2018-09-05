<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Traslado;
use App\Models\Aeropuerto;
use App\Models\Autos;
<<<<<<< Updated upstream
use App\Models\Hotel;
=======
>>>>>>> Stashed changes


class ControllerTraslados extends Controller{

<<<<<<< Updated upstream
  
  public function index_aeropuertoHotel(){
    
    $paises = Aeropuerto::select('pais')->distinct('pais')->orderBy('pais','asc')->get();

    return view('traslados.create-traslado-aeropuertoHotel')->with('paises',$paises);
  }

  // REQUESTS AeropuertoHotel
=======
<<<<<<< HEAD
>>>>>>> Stashed changes

  public function queryCiudad(Request $request){
        
    $ciudades = Aeropuerto::where('pais', '=', $request['pais'])->orderBy('ciudad','asc')->get();
    return json_encode($ciudades);
  }
<<<<<<< Updated upstream
//################################
  //############ ERROR buenos aires por tomar solo buenos o los paises en la primera palabraa

  public function queryAeropuerto(Request $request){
       
    $cod_aeropuertos = Aeropuerto::where('cod_aeropuerto','=', $request['ciudad'])->get();////where('ciudad', '=', $request['ciudad'])->get();

    return($cod_aeropuertos);
  }


  public function queryHotel(Request $request){
    

    $ciudad_aeropuerto=Aeropuerto::select('ciudad')->where('cod_aeropuerto','=',$request['cod_aeropuerto'])->get();
    $hoteles = Hotel::where('ciudad','=',$ciudad_aeropuerto[0]['ciudad'])->get();

    return  $hoteles;
  }











  public function queryCoordenadas(Request $request){


    $lat_hotel =  Hotel::select('latitud')->where('id_hotel','=',$request['hotel'])->get();
    $lon_hotel =  Hotel::select('longitud')->where('id_hotel','=',$request['hotel'])->get();


    $pais_hotel = Hotel::select('ciudad')->where('id_hotel','=',$request['hotel'])->get();

    $lat_aeropuerto = Aeropuerto::select('latitud')->where('ciudad','=',$pais_hotel[0]['ciudad'])->get(); 
    $lon_aeropeurto = Aeropuerto::select('longitud')->where('ciudado','=',$pais_hotel[0]['ciudad'])->get();

  
    $coordenadas = array('lat_hotel' => $lat_hotel, 'lon_hotel' => $lon_hotel, 'lat_aeropuerto' => $lat_aeropuerto, 'lon_aeropuerto' => lon_aeropuerto);



  
    return json_encode($coordenadas);
=======
=======
  
  public function index_aeropuertoHotel(){
    

    $paises = Aeropuerto::select('pais')->distinct('pais')->orderBy('pais','asc')->get();

    return view('traslados.create-traslado-aeropuertoHotel')->with('paises',$paises);
  }

  // REQUESTS AeropuertoHotel
>>>>>>> 4535e3ad78f3f3e767a8bbdc38294dcc0b1ac869

  public function queryCiudad(Request $request){
        
    $ciudades = Aeropuerto::select('ciudad')->where('pais', '=', $request['pais'])->get();
    return json_encode($ciudades);
  }


  public function queryAeropuerto(Request $request){
    
    
    $cod_aeropuertos = Aeropuerto::select('cod_aeropuerto')->get();//->where('ciudad', '=', $request['ciudad'])->get();

    $json_string = json_encode($request, JSON_PRETTY_PRINT);


    return json_encode($cod_aeropuertos);
>>>>>>> Stashed changes
  }
<<<<<<< HEAD

<<<<<<< Updated upstream
=======
  public function create_hotel_a_aeropuerto(){
=======
>>>>>>> 4535e3ad78f3f3e767a8bbdc38294dcc0b1ac869
>>>>>>> Stashed changes

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  


<<<<<<< Updated upstream


  public function crear_traslado(Request $request){

    $validate = $request->validate([
      'pais'        => 'required|string',
      'ciudad'      => 'required|string',
      'hotel'       => 'required|string',
      'aeropuerto'  => 'required|string',
      'cantidad'   => 'required|integer',
      'fecha'       => 'required',
      'horas'       => 'required|integer',
      'minutos'     => 'required|integer'
    ]);


    $aeropuerto = Aeropuerto::select();
    $hotel = Hotel::select();


    




    /*if(($ciudad = $aeropuerto->ciudad) != $hotel->ciudad){
      error return 
    }


    $puntoOrigen = ;
    $puntoDestino = ;
    $distancia = calcularDistancia($puntoOrigen, $puntoDestino);

    $chofer = Chofer::where('ciudad', '=', $ciudad)->where('cap_pasajeros', '>=', $capacidad)->first();


    $traslado = new Traslado();

    $traslado->chofer->associate($chofer);
    $traslado->aeropuerto = $aeropuerto->codigo_aeropuerto;
    $traslado->hotel = $hotel->nombre_hotel;
    $traslado->distancia = $distancia;
    $traslado->capacidad = request['capacidad']; //$request->input('capacidad') //$_POST('capacidad')*/

    

    return;
  }


  





































  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  public function index_hotelAeropuerto(){
    
    $lista_paises = DB::table('aeropuertos')->select('pais')->distinct()->get();

    return view('traslados.create-traslado-hotelAeropuerto')->with('lista_paises',$lista_paises);
  }

  
  /*public function crear_traslado(Request $request){
=======
  public function index_hotelAeropuerto(){
    
    $lista_paises = DB::table('aeropuertos')->select('pais')->distinct()->get();

    return view('traslados.create-traslado-hotelAeropuerto')->with('lista_paises',$lista_paises);
  }

  


 /* public function crear_traslado(Request $request){
>>>>>>> Stashed changes


    $validate = $request->validate({
      'pais' => 'required|string',
      'hotel' => 'required',
      'aeropuerto' => 'required',
      'capacidad' => 'required'
    });

    //$aeropuerto = Aeropuerto::select()...;
    //$hotel = Hotel::select()...;

    if(($ciudad = $aeropuerto->ciudad) != $hotel->ciudad){
      error return 
    }
    $puntoOrigen = ;
    $puntoDestino = ;
    $distancia = calcularDistancia($puntoOrigen, $puntoDestino);

    $chofer = Chofer::where('ciudad', '=', $ciudad)->where('cap_pasajeros', '>=', $capacidad)->first();


    $traslado = new Traslado();

    $traslado->chofer->associate($chofer);
    $traslado->aeropuerto = $aeropuerto->codigo_aeropuerto;
    $traslado->hotel = $hotel->nombre_hotel;
    $traslado->distancia = $distancia;
    $traslado->capacidad = request['capacidad']; //$request->input('capacidad') //$_POST('capacidad')


  }*/

<<<<<<< Updated upstream
=======













>>>>>>> Stashed changes
}
