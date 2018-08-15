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
        }else{
          return redirect("/")->with('failure', 'El carrito esta vacío');
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
             case 'Vuelo':
               $vuelo = \App\Models\Vuelo::findOrFail($item->id);
               switch ($item->tipo_pasaje) {
                 case 'Turista':
                   $transaccion->vuelos()->attach($item->id, ['hora_compra' => \Carbon\Carbon::now(), 'num_asiento' => rand(1, $vuelo->cap_turista), 'tipo_asiento' => 'Turista']);
                   $vuelo->cap_turista = $vuelo->cap_turista - 1;
                   break;
                 case 'Ejecutivo':
                   $transaccion->vuelos()->attach($item->id, ['hora_compra' => \Carbon\Carbon::now(), 'num_asiento' => rand(1, $vuelo->cap_ejecutivo), 'tipo_asiento' => 'Ejecutivo']);
                   $vuelo->cap_ejecutivo = $vuelo->cap_ejecutivo - 1;
                   break;
                 case 'Primera Clase':
                   $transaccion->vuelos()->attach($item->id, ['hora_compra' => \Carbon\Carbon::now(), 'num_asiento' => rand(1, $vuelo->cap_primera_clase), 'tipo_asiento' => 'Primera Clase']);
                   $vuelo->cap_primera_clase = $vuelo->cap_primera_clase - 1;
                   break;
               }
               $vuelo->save();
               break;
             case 'Habitación':
              $habitacion = \App\Models\Habitacion::findOrFail($item->id);
              $transaccion->habitaciones()->attach($item->id, ['hora_reserva' => \Carbon\Carbon::now(), 'num_noches' => $item->cantidad, 'inicio_reserva' => \Carbon\Carbon::now(), 'fin_reserva' => \Carbon\Carbon::now()->addDays($item->cantidad)]);
              break;
             default:
               break;
           }
    	 	}
        Session::forget("carrito");
        return redirect("/historial");
    }

    public function verHistorial(){
      $id = Auth::user()->id_usuario;
      $transacciones = DB::select(DB::raw("SELECT * FROM transacciones WHERE id_usuario = '$id'"));
      $vuelos_reservados = DB::select('
                          SELECT c.id_transaccion, c.nombre_avion, c.nombre_aerolinea, c.aeropuerto_origen, c.aeropuerto_destino, c.hora_compra, c.num_asiento, c.tipo_asiento
                          FROM
                            (SELECT cp.id_transaccion, t.id_usuario, v.nombre_avion, v.nombre_aerolinea, v.aeropuerto_origen, v.aeropuerto_destino, t.hora_compra, cp.num_asiento, cp.tipo_asiento
                            FROM vuelos v, compra_pasaje cp, transacciones t WHERE v.id_vuelo = cp.id_vuelo AND cp.id_transaccion = t.id_transaccion) c
                          WHERE c.id_usuario = :id;', ['id' => $id]);

      $habitaciones_reservadas = DB::select('
                          SELECT c.id_transaccion, c.nombre_hotel, c.pais, c.ciudad, c.direccion, c.num_habitacion, c.hora_reserva, c.inicio_reserva, c.fin_reserva, c.monto
                          FROM
                            (SELECT t.id_usuario, r.id_transaccion, r.nombre_hotel, r.pais, r.ciudad, r.direccion, r.num_habitacion, r.hora_reserva, r.inicio_reserva, r.fin_reserva, t.monto
                            FROM transacciones t,
                              (SELECT ch.id_transaccion, h.nombre_hotel, h.pais, h.ciudad, h.direccion, hab.num_habitacion, ch.hora_reserva, ch.inicio_reserva, ch.fin_reserva
                              FROM hoteles h, habitaciones hab, compra_habitacion ch
                              WHERE hab.id_habitacion = ch.id_habitacion AND h.id_hotel = hab.id_hotel) r
                            WHERE r.id_transaccion = t.id_transaccion) c
                          WHERE c.id_usuario = :id;', ['id' => $id]);
      if($transacciones != NULL)
        return view('historial')->with('transacciones', $transacciones)->with('vuelos_reservados', $vuelos_reservados)->with('habitaciones_reservadas', $habitaciones_reservadas);//->with('habitaciones', $habitaciones_reservadas);
      else {
        return redirect('/')->with('failure', 'No hay compras realizadas');
      }
    }

    //// WIP
    // public function autos(){
    //   return $this->hasMany(App\Models\Vuelo::class, 'compra_pasaje', 'id_usuario', 'id_vuelo');
    // }
}
