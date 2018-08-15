<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use Carbon\Carbon;

class ControllerVuelos extends Controller
{
  public function index(){
      $vuelos = Vuelo::orderBy('valor_turista', 'asc')->paginate(5); //Cambiar a ordenarlos segun criterios
      return view('vuelos.buscar-vuelos')->with('vuelos', $vuelos);
  }

  public function create(){
      return view('vuelos.insertar-vuelo');
  }

  public function store(Request $req){

    try{
      $num_vuelo = $req->input('n_avion');
      $aerolinea = $req->input('aerolinea');
      $a_destino = $req->input('a_origen');
      $a_origen = $req->input('a_destino');
      $h_salida = $req->input('hora_salida');
      $h_llegada = $req->input('hora_llegada');
      $hora_salida = Carbon::createFromFormat('d/m/Y H:i', $h_salida);
      $hora_llegada = Carbon::createFromFormat('d/m/Y H:i', $h_llegada);
      $cap_equipaje = $req->input('c_equipaje');
      $maletas = $req->input('num_maletas');
      $cap_t = $req->input('c_turista');
      $cap_e = $req->input('c_ejecutivo');
      $cap_p = $req->input('c_primera_clase');
      $desc = $req->input('descuento');
      $precio_t = $req->input('p_turista');
      $precio_e = $req->input('p_ejecutivo');
      $precio_p = $req->input('p_primera_clase');

      $array = array(
      'nombre_avion'=> $num_vuelo,
      'nombre_aerolinea'=> $aerolinea,
      'aeropuerto_origen'=> $a_origen,
      'aeropuerto_destino'=> $a_destino,
      'hora_salida'=>$hora_salida,
      'hora_llegada'=>$hora_llegada,
      'cap_turista'=> $cap_t,
      'cap_ejecutivo'=> $cap_e,
      'cap_primera_clase'=> $cap_p,
      'cap_equipaje'=>$cap_equipaje,
      'maletas_por_persona'=>$maletas,
      'descuento'=> $desc,
      'valor_turista'=> $precio_t,
      'valor_ejecutivo'=> $precio_e,
      'valor_primera_clase'=> $precio_p,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s')
      );
      Vuelo::insert($array);
      return redirect('/vuelos')->with('success', 'Vuelo agregado exitósamente');
    }catch(Exception $e){
      return redirect('/vuelos')->with('failure', 'Ocurrio un error al ingresar un vuelo');
    }
  }

  public function show($id){
    $vuelo = Vuelo::find($id);
    $dateTimeSalida = $vuelo->hora_salida;
    $dateTimeLlegada = $vuelo->hora_llegada;
    $tiempoViaje = number_format($this->timeDiff($dateTimeSalida, $dateTimeLlegada), 1);
    $tiempoViaje = $tiempoViaje." horas";
    //echo "Horas: ".$tiempoViaje;
    return view('vuelos.detalle-vuelo')->with('vuelo', $vuelo)->with('horas', $tiempoViaje);
  }

  function timeDiff($firstTime,$lastTime){
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);
    $timeDiff=($lastTime-$firstTime)/3600;
    return $timeDiff;
  }

  public function edit($id){

  }

  public function update(Request $request, $id){

  }

  public function destroy($id){

  }
}
