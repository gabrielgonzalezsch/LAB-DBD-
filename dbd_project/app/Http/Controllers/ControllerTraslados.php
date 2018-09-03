<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Traslado;

class ControllerTraslados extends Controller{


  public function getCiudades(Request $request){
    $pais = $request->input('pais');
    $ciudades = \App\Models\Aeropuerto::select('ciudad')->where('pais', '=', $pais)->get();
    return json_encode($ciudades);
  }

  public function create_aeropuerto_a_hotel(){


    $paises = DB::table('aeropuertos')->select('pais')->orderBy('pais')->distinct()->get();
    $ciudad = DB::table('aeropuertos')->select('pais')->orderBy('pais')->distinct()->get();

    return view('traslados.create-aeropuerto-a-hotel',['paises' => $paises]);
  }

  public function create_hotel_a_aeropuerto(){


    $paises = DB::table('aeropuertos')->select('pais')->orderBy('pais')->distinct()->get();
    $ciudad = DB::table('aeropuertos')->select('pais')->orderBy('pais')->distinct()->get();

    return view('traslados.create-hotel-a-aeropuerto',['paises' => $paises]);

  }
}
