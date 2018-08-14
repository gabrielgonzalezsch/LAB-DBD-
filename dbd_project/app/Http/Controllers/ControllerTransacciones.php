<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransacciones extends Controller
{
    public function comprar(){
        $usuario = Auth::user();
        $transaccion = new Transaccion();
        if (Session::has("carrito")){
    	 		$carrito = json_decode(Session::get("carrito"));
        }
        $transaccion->monto = $carrito->total;
        $transaccion->id_usuario = $usuario->id_usuario;
        $transaccion->ya_cancelado = true; //Para efectos practicos de prueba
        $transaccion->hora_compra = \Carbon\Carbon::now();
        $transaccion->numero_cuenta_compra = rand(100, 1000);//$usuario->numero_cuenta_usuario;
        $transaccion->usuario()->associate($usuario);
        $transaccion->save();
        //$usuario->transacciones()->save($transaccion);
    	 	foreach ($carrito->items as $item){
    	 		switch ($item->categoria){
             case 'Vuelos':
               $vuelo = \App\Models\Vuelo::findOrFail($item->id);
               //Hay que corregir esto
               $transaccion->vuelos()->attach($item->id, ['hora_compra' => \Carbon\Carbon::now(), 'num_asiento' => rand(1, $vuelo->cap_turista)]);
               break;
             case 'Habitación':
              $habitacion = \App\Models\Habitacion::findOrFail($item->id);
              //Hay que corregir esto********
              $num_dias = rand(1, 30);
              $transaccion->habitaciones()->attach($item->id, ['hora_reserva' => \Carbon\Carbon::now(), 'num_dias' => $num_dias]);
              break;
             default:
               break;
           }
    	 	}
        $this->verHistorial();

    }

    public function verHistorial(){
      $id = Auth::user()->id_usuario;
      $transacciones = DB::select(DB::raw("SELECT * FROM transacciones WHERE id_usuario = '$id'"));
      if($transacciones != NULL)
        return view('historial')->with('transacciones', $transacciones);
      else {
        return redirect('/')->with('failure', 'nope');
      }
    }

    //// WIP
    // public function autos(){
    //   return $this->hasMany(App\Models\Vuelo::class, 'compra_pasaje', 'id_usuario', 'id_vuelo');
    // }
}
