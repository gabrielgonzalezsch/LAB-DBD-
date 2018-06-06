<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelos;

class ControllerInsertVuelo extends Controller
{
  function insert(Request $req){

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
}
