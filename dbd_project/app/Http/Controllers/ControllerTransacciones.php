<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class ControllerTransacciones extends Controller
{
    public function fondos(){
      return view('agregar-fondos');
    }
    public function addFondos(Request $req){
      $usuario = Auth::user();
      $usuario->fondos_disponibles = $usuario->fondos_disponibles + $req['fondos'];
      $usuario->save();
      return redirect('/')->with('success', 'Fondos cargados');
    }

    public function comprar(){
        $usuario = Auth::user();
        $transaccion = new Transaccion();
        if (Session::has("carrito")){
    	 		$carrito = json_decode(Session::get("carrito"));
        }else{
          return redirect("/")->with('failure', 'El carrito esta vacío');
        }
        if($carrito->total > $usuario->fondos_disponibles){
          return redirect('/carrito')->with('failure', 'No tiene suficientes fondos para realizar esta compra!');
        }
        $transaccion->monto = $carrito->total;
        $transaccion->id_usuario = $usuario->id_usuario;
        $transaccion->ya_cancelado = true; //Para efectos practicos de prueba
        $transaccion->hora_compra = \Carbon\Carbon::now();
        $transaccion->numero_cuenta_compra = $usuario->numero_cuenta_usuario;
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
              $fecha_inicio = new Carbon($item->fecha_inicio);
              $transaccion->habitaciones()->attach($item->id, ['hora_reserva' => \Carbon\Carbon::now(), 'num_noches' => $item->cantidad, 'inicio_reserva' => $fecha_inicio, 'fin_reserva' => $fecha_inicio->addDays($item->cantidad)]);
              $habitacion->ya_reservado = true;
              $habitacion->fecha_inicio_reserva = $fecha_inicio;
              $habitacion->fecha_fin_reserva = $fecha_inicio->addDays($item->cantidad);
              $habitacion->save();
              break;
             case 'Auto':
              $auto = \App\Models\Auto::findOrFail($item->id);
              $transaccion->autos()->attach($item->id, ['hora_reserva' => \Carbon\Carbon::now(), 'num_dias' => $item->cantidad, 'inicio_reserva' => $item->inicio_reserva, 'fin_reserva' => $item->fin_reserva]);
              $auto->inicio_reserva = $inicio_reserva;
              $auto->inicio_reserva = $fin_reserva;
              $auto->ya_reservado = true;
              $auto->save();
              break;
             case 'Actividad':
              $actividad = \App\Models\Actividad::findOrFail($item->id);
              $transaccion->actividades()->attach($item->id, ['hora_compra' => \Carbon\Carbon::now(), 'tipo_entrada' => 'Adulto', 'num_entradas' => $item->cantidad]);
              $actividad->cupos = $actividad->cupos - $item->cantidad;
              $actividad->save();
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
      $autos_arrendados = DB::select('
                          SELECT c.id_transaccion, c.modelo_auto, c.patente, c.pais_arriendo, c.ciudad_arriendo, c.calle_arriendo, c.inicio_reserva, c.fin_reserva, c.hora_reserva, c.monto
                          FROM
                            (SELECT t.id_usuario, ra.id_transaccion, a.modelo_auto, a.patente, a.pais_arriendo, a.ciudad_arriendo, a.calle_arriendo, ra.inicio_reserva, ra.fin_reserva, ra.hora_reserva, t.monto
                            FROM autos a, reserva_auto ra, transacciones t
                            WHERE a.id_auto = ra.id_auto AND ra.id_transaccion = t.id_transaccion) c
                          WHERE c.id_usuario = :id;', ['id' => $id]);
      $actividades_compradas = DB::select('
                          SELECT c.id_transaccion, c.nombre_actividad, c.pais, c.ciudad, c.calle, c.tipo_entrada, c.num_entradas, c.hora_compra, c.monto
                          FROM
                            (SELECT t.id_usuario, ca.id_transaccion, a.nombre_actividad, a.pais, a.ciudad, a.calle, ca.tipo_entrada, ca.num_entradas, ca.hora_compra, t.monto
                            FROM actividad a, compra_actividad ca, transacciones t
                            WHERE a.id_actividad = ca.id_actividad AND ca.id_transaccion = t.id_transaccion) c
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
        return view('historial')->with('transacciones', $transacciones)
        ->with('vuelos_reservados', $vuelos_reservados)
        ->with('habitaciones_reservadas', $habitaciones_reservadas)
        ->with('autos_arrendados', $autos_arrendados)
        ->with('actividades_compradas', $actividades_compradas);
      else {
        return redirect('/')->with('failure', 'No hay compras realizadas');
      }
    }
}
