<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Traslado;
use App\Models\Aeropuerto;
use App\Models\Autos;
use App\Models\Hotel;


class ControllerTraslados extends Controller{



//############################################################################################################################
//############################################################################################################################
//############################################################################################################################
//############################################################################################################################

  // PRIMERA VISTA AEROPUERTO -> HOTEL

  public function index_aeropuertoHotel(){

    $paises = Aeropuerto::select('pais')->distinct('pais')->orderBy('pais','asc')->get();
    return view('traslados.create-traslado-aeropuertoHotel')->with('paises',$paises);
  }

  // REQUESTS AeropuertoHotel

  public function queryCiudad(Request $request){

    $ciudades = Aeropuerto::where('pais', '=', $request['pais'])->orderBy('ciudad','asc')->get();
    return json_encode($ciudades);
  }

  public function queryAeropuerto(Request $request){

    $cod_aeropuertos = Aeropuerto::where('cod_aeropuerto','=', $request['ciudad'])->get();
    return($cod_aeropuertos);
  }


  public function queryHotel(Request $request){

    $ciudad_aeropuerto=Aeropuerto::select('ciudad')->where('cod_aeropuerto','=',$request['cod_aeropuerto'])->get();
    $hoteles = Hotel::where('ciudad','=',$ciudad_aeropuerto[0]['ciudad'])->get();
    return  $hoteles;
  }

  public function queryOrigenAeropuerto(Request $request){

    $aero_lat = Aeropuerto::select('latitud')->where('cod_aeropuerto','=',$request['cod_aeropuerto'])->get();
    $aero_lon = Aeropuerto::select('longitud')->where('cod_aeropuerto','=',$request['cod_aeropuerto'])->get();
    $coordenadas = array('aero_lat' => $aero_lat, 'aero_lon' => $aero_lon);
    return $coordenadas;
  }


  public function queryDestinoHotel(Request $request){

    $h_lat = Hotel::select('latitud')->where('id_hotel','=',$request['hotel'])->get();
    $h_lon = Hotel::select('longitud')->where('id_hotel','=',$request['hotel'])->get();

    $coordenadas = array('h_lat'=> $h_lat, 'h_lon' => $h_lon);

    return $coordenadas;
  }


  public function queryChoferes(Request $request){

    $ciudad = Aeropuerto::select('ciudad')->where('cod_aeropuerto','=',$request['ciudad'])->first();

    $drivers = \App\Models\Chofer::where('ciudad', '=', $ciudad['ciudad'])->get();


    return json_encode($drivers);
  }



 // public function crear_traslado(Request $request){
 //
 //    $validate = $request->validate([
 //      'pais'        => 'required|string',
 //      'ciudad'      => 'required|string',
 //      'hotel'       => 'required|string',
 //      'aeropuerto'  => 'required|string',
 //      'cantidad'   => 'required|integer',
 //      'fecha'       => 'required',
 //      'horas'       => 'required|integer',
 //      'minutos'     => 'required|integer'
 //    ]);
 //
 //    $aeropuerto = Aeropuerto::select();
 //    $hotel = Hotel::select();
 //
 //
 //
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

  //   return;
  // }

//############################################################################################################################
//############################################################################################################################
//############################################################################################################################
//############################################################################################################################








  /*public function crear_traslado(Request $request){


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
