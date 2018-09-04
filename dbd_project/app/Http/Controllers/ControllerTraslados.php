<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Traslado;
use App\Models\Aeropuerto;
use App\Models\Autos;


class ControllerTraslados extends Controller{

  
  public function index_aeropuertoHotel(){
    

    $paises = Aeropuerto::select('pais')->distinct('pais')->orderBy('pais','asc')->get();

    return view('traslados.create-traslado-aeropuertoHotel')->with('paises',$paises);
  }

  // REQUESTS AeropuertoHotel

  public function queryCiudad(Request $request){
        
    $ciudades = Aeropuerto::select('ciudad')->where('pais', '=', $request['pais'])->get();
    return json_encode($ciudades);
  }


  public function queryAeropuerto(Request $request){
    
    
    $cod_aeropuertos = Aeropuerto::select('cod_aeropuerto')->get();//->where('ciudad', '=', $request['ciudad'])->get();

    $json_string = json_encode($request, JSON_PRETTY_PRINT);


    return json_encode($cod_aeropuertos);
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  


  public function index_hotelAeropuerto(){
    
    $lista_paises = DB::table('aeropuertos')->select('pais')->distinct()->get();

    return view('traslados.create-traslado-hotelAeropuerto')->with('lista_paises',$lista_paises);
  }

  


 /* public function crear_traslado(Request $request){


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














}

	

  	

