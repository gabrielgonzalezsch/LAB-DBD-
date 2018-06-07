<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelos;

class ControllerVuelos extends Controller
{
  public function index(){
      $vuelos = Vuelos::orderBy('valor_turista', 'asc')->paginate(1); //Cambiar a ordenarlos segun criterios
      return view('vuelos.buscar-vuelos')->with('vuelos', $vuelos);
  }

  public function store(Request $req){

      /*$this->validator($req, [
      'username' => 'required',
      'password' => 'required',
      'email' =>'required'
    ]);*/
      $n_vuelo = $req->input('n_avion');
      $a_destino = $req->input('a_origen');
      $a_origen = $req->input('a_destino');
      $horaS = $req->input('h_salida');
      $horaL = $req->input('h_llegada');
      $fechaS = $req->input('f_salida');
      $fechaL = $req->input('f_llegada');
      $cap_equipaje = $req->input('c_equipaje');
      $cap_t = $req->input('c_turista');
      $cap_e = $req->input('c_ejecutivo');
      $cap_p = $req->input('c_primera_clase');
      $desc = $req->input('descuento');
      $precio_t = $req->input('p_turista');
      $precio_e = $req->input('p_ejecutivo');
      $precio_p = $req->input('p_primera_clase');

      $array = array(
      'nombre_avion'=> $n_vuelo,
      'aeropuerto_origen'=> $a_origen,
      'aeropuerto_destino'=> $a_destino,
      'hora_salida'=>$horaS,
      'hora_llegada'=>$horaL,
      'fecha_salida'=>$fechaS,
      'fecha_llegada'=>$fechaL,
      'cap_equipaje'=>$cap_equipaje,
      'cap_turista'=> $cap_t,
      'cap_ejecutivo'=> $cap_e,
      'cap_primera_clase'=> $cap_p,
      'descuento'=> $desc,
      'valor_turista'=> $precio_t,
      'valor_ejecutivo'=> $precio_e,
      'valor_primera_clase'=> $precio_p,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s')
      );

      Vuelos::insert($array);
      echo "Success!";
  }

  public function show($id){
    $vuelo = Vuelos::find($id);
    $fechaS = $vuelo->fecha_salida;
    $fechaL = $vuelo->fecha_llegada;
    $horaS = $vuelo->hora_salida;
    $horaL = $vuelo->hora_llegada;
    $dateTimeLlegada = date('Y-m-d H:i:s', strtotime("$fechaS $horaS"));
    $dateTimeSalida = date('Y-m-d H:i:s', strtotime("$fechaL $horaL"));
    $tiempoViaje = $this->timeDiff($dateTimeSalida, $dateTimeLlegada);
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
