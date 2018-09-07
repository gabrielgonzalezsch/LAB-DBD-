<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerCarrito extends Controller
{

  /*
  Carrito es un JSON de la siguiente estructura:
  {"carrito":
   {
   "items":[
     {
     "id": "id1"
     "categoria": "vuelo",
     "cantidad" : "3",
     "precio" : "20000",
     "descuento" : "10",
     "subtotal" : "60000"
     },
     ...
   ],
   "total" = "54000";
   }
  }
  */

  public function mostrarCarrito(){
    $carrito = null;
    if (Session::has("carrito")){
	 		$carrito = json_decode(Session::get("carrito"));
	 	}else{
      $carrito = new \stdClass();
      $carrito->items = [];
      $carrito->total = 0;
    }
    return view('carrito/carrito')->with("carrito", $carrito);
  }

    public function eliminarDelCarrito(Request $req){
    $index = $req->input('index');
    if (Session::has("carrito")){
	 		$carrito = json_decode(Session::get("carrito"));
      $items = $carrito->items;
      $carrito->total = $carrito->total - $carrito->items[$index]->subtotal;
      array_splice($carrito->items, $index, 1);
      Session::put("carrito", json_encode($carrito));
      return json_encode($carrito);
    }
  }

    public function addHabitacionAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }

      $id = $request->input("id");
      $nombreHotel = $request->input("nombre");
      $fecha_inicio_reserva = $request->input("fecha_inicio");
      $fecha_fin_reserva = $request->input("fecha_fin");
      $cantidad = $request->input("cantidad");

      $habitacion = \App\Models\Habitacion::findOrFail($id);

      $nuevoItem = new \stdClass();
      $nuevoItem->id = $id;
      $nuevoItem->categoria = 'Habitación';
      $nuevoItem->subcategoria = 'Arriendos';
      $nuevoItem->precio = $habitacion->precio_por_noche;
      $nuevoItem->nombre = $nombreHotel;
      $nuevoItem->fecha_inicio = $fecha_inicio_reserva;
      $nuevoItem->fecha_fin = $fecha_fin_reserva;
	 		$nuevoItem->cantidad = $cantidad;
      $nuevoItem->descuento = $habitacion->descuento;
	 		$nuevoItem->subtotal= $nuevoItem->precio * $cantidad;
      array_push($carrito->items, $nuevoItem);

      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
    }

    public function addAutoPaqueteAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }

      $id = $request->input("id");
      $id_paquete = $request->input("id_paquete");
      $nombreAuto = $request->input("nombre");
      $cantidad = (int)$request->input("cantidad");
      $inicio = $request->input("inicio");
      $fin = $request->input("fin");
      $auto = \App\Models\Auto::findOrFail($id);
      $paquete = \App\Models\Paquete::findOrFail($id_paquete);

      $nuevoItem = new \stdClass();
      $nuevoItem->id = $id;
      $nuevoItem->id_paquete = $id_paquete;
      $nuevoItem->categoria = 'Paquete';
      $nuevoItem->subcategoria = 'Auto';
      $nuevoItem->tipo_paquete = 'Vuelo + Auto';
      $nuevoItem->precio = $auto->precio_por_dia;
      $nuevoItem->nombre = $nombreAuto;
	 		$nuevoItem->cantidad = $cantidad;
      $nuevoItem->inicio_arriendo = $inicio;
      $nuevoItem->fin_arriendo = $fin;
      $nuevoItem->descuento = $auto->descuento;
      $nuevoItem->descuento_paquete = $paquete->descuento_paquete;
	 		$nuevoItem->subtotal= $nuevoItem->precio * $cantidad;
      array_push($carrito->items, $nuevoItem);
      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
      //return json_encode($carrito);
    }

    public function addAutoAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }

      $id = $request->input("id");
      $nombreAuto = $request->input("nombre");
      $cantidad = $request->input("cantidad");
      $inicio = $request->input("inicio");
      $fin = $request->input("fin");
      $auto = \App\Models\Auto::findOrFail($id);

      $nuevoItem = new \stdClass();
      $nuevoItem->id = $id;
      $nuevoItem->categoria = 'Auto';
      $nuevoItem->subcategoria = 'Arriendos';
      $nuevoItem->precio = $auto->precio_por_dia;
      $nuevoItem->nombre = $nombreAuto;
	 		$nuevoItem->cantidad = $cantidad;
      $nuevoItem->inicio_arriendo = $inicio;
      $nuevoItem->fin_arriendo = $fin;
      $nuevoItem->descuento = $auto->descuento;
	 		$nuevoItem->subtotal= $nuevoItem->precio * $cantidad;
      array_push($carrito->items, $nuevoItem);

      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
    }

    public function addActividadAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }

      $id = $request->input("id");
      $nombreActividad = $request->input("nombre");
      $cantidad = $request->input("cantidad");

      $actividad = \App\Models\Actividad::findOrFail($id);

      $nuevoItem = new \stdClass();
      $nuevoItem->id = $id;
      $nuevoItem->categoria = 'Actividad';
      $nuevoItem->subcategoria = 'Reservas';
      $nuevoItem->precio = $actividad->valor_entrada;
      $nuevoItem->nombre = $nombreActividad;
	 		$nuevoItem->cantidad = $cantidad;
      $nuevoItem->descuento = $actividad->descuento;
	 		$nuevoItem->subtotal= $nuevoItem->precio * $cantidad;
      array_push($carrito->items, $nuevoItem);

      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
    }

    public function addVueloPaqueteAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }

      $id = $request->input("id");
      $tempData = html_entity_decode($request->input("pasajes"));
      $pasajes = json_decode($tempData, true);
      $num_turista= $pasajes['turista'];
      $num_ejecutivo = $pasajes['ejecutivo'];
      $num_pc = $pasajes['pc'];
      $id_paquete = $request->input("id_paquete");
      $vuelo = \App\Models\Vuelo::findOrFail($id);
      $paquete = \App\Models\Paquete::findOrFail($id_paquete);

      if($num_turista > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id;
        $nuevoItem->id_paquete = $id_paquete;
        $nuevoItem->nombre = $vuelo->nombre_avion;
        $nuevoItem->categoria = 'Paquete';
        $nuevoItem->tipo_paquete = 'Vuelo + Auto';
        $nuevoItem->subcategoria = 'Vuelo';
        $nuevoItem->tipo_pasaje = 'Turista';
        $nuevoItem->precio = $vuelo->valor_turista;
        $nuevoItem->descuento = $vuelo->descuento;
        $nuevoItem->descuento_paquete = $paquete->descuento_paquete;
  	 		$nuevoItem->cantidad = $num_turista;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_turista - $nuevoItem->precio * $num_turista * ($paquete->descuento/100) - $nuevoItem->precio * $num_turista  * ($vuelo->descuento/100));
        array_push($carrito->items, $nuevoItem);
      }
      if($num_ejecutivo > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id;
        $nuevoItem->id_paquete = $id_paquete;
        $nuevoItem->nombre = $vuelo->nombre_avion;
        $nuevoItem->categoria = 'Paquete';
        $nuevoItem->tipo_paquete = 'Vuelo + Auto';
        $nuevoItem->subcategoria = 'Vuelo';
        $nuevoItem->tipo_pasaje = 'Ejecutivo';
        $nuevoItem->precio = $vuelo->valor_ejecutivo;
        $nuevoItem->descuento = $vuelo->descuento;
        $nuevoItem->descuento_paquete = $paquete->descuento_paquete;
  	 		$nuevoItem->cantidad = $num_ejecutivo;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_ejecutivo - $nuevoItem->precio * $num_ejecutivo * ($paquete->descuento/100) - $nuevoItem->precio * $num_ejecutivo * ($vuelo->descuento/100));
        array_push($carrito->items, $nuevoItem);
      }
      if($num_pc > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id;
        $nuevoItem->id_paquete = $id_paquete;
        $nuevoItem->nombre = $vuelo->nombre_avion;
        $nuevoItem->categoria = 'Paquete';
        $nuevoItem->tipo_paquete = 'Vuelo + Auto';
        $nuevoItem->subcategoria = 'Vuelo';
        $nuevoItem->tipo_pasaje = 'Primera Clase';
        $nuevoItem->precio = $vuelo->valor_primera_clase;
        $nuevoItem->descuento = $vuelo->descuento;
        $nuevoItem->descuento_paquete = $paquete->descuento_paquete;
  	 		$nuevoItem->cantidad = $num_pc;
  	 		$nuevoItem->subtotal = round($nuevoItem->precio * $num_pc - $nuevoItem->precio * $num_ejecutivo * ($paquete->descuento/100) - $nuevoItem->precio * $num_pc * ($vuelo->descuento/100));
        array_push($carrito->items, $nuevoItem);
      }
      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
    }

    public function addJointVueloAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }
      try{

      $id_ida = $request->input("id_ida");
      $id_vuelta = $request->input("id_vuelta");
      $tempData = html_entity_decode($request->input("pasajes"));
      $pasajes = json_decode($tempData, true);
      $num_turista= $pasajes['turista'];
      $num_ejecutivo = $pasajes['ejecutivo'];
      $num_pc = $pasajes['pc'];
      $vuelo_ida = \App\Models\Vuelo::findOrFail($id_ida);
      $vuelo_vuelta = \App\Models\Vuelo::findOrFail($id_vuelta);

      if($num_turista > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id_ida;
        $nuevoItem->nombre = $vuelo_ida->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->subcategoria = 'Vuelo ida';
        $nuevoItem->tipo_pasaje = 'Turista';
        $nuevoItem->precio = $vuelo_ida->valor_turista;
        $nuevoItem->descuento = $vuelo_ida->descuento;
  	 		$nuevoItem->cantidad = $num_turista;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_turista - $nuevoItem->precio * $num_turista  * ($vuelo_ida->descuento/100));
        $nuevoItem2 = clone $nuevoItem;
        array_push($carrito->items, $nuevoItem);
        $nuevoItem2->id = $id_vuelta;
        $nuevoItem2->nombre = $vuelo_vuelta->nombre_avion;
        $nuevoItem2->subcategoria = 'Vuelo vuelta';
        $nuevoItem2->precio = $vuelo_vuelta->valor_turista;
        $nuevoItem2->subtotal= round($nuevoItem2->precio * $num_turista - $nuevoItem2->precio * $num_turista  * ($vuelo_vuelta->descuento/100));
        array_push($carrito->items, $nuevoItem2);
      }
      if($num_ejecutivo > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id_ida;
        $nuevoItem->nombre = $vuelo_ida->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->subcategoria = 'Vuelo ida';
        $nuevoItem->tipo_pasaje = 'Ejecutivo';
        $nuevoItem->precio = $vuelo_ida->valor_ejecutivo;
        $nuevoItem->descuento = $vuelo_ida->descuento;
  	 		$nuevoItem->cantidad = $num_ejecutivo;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_ejecutivo - $nuevoItem->precio * $num_ejecutivo * ($vuelo_ida->descuento/100));
        $nuevoItem2 = clone $nuevoItem;
        array_push($carrito->items, $nuevoItem);
        $nuevoItem2->id = $id_vuelta;
        $nuevoItem2->nombre = $vuelo_vuelta->nombre_avion;
        $nuevoItem2->subcategoria = 'Vuelo vuelta';
        $nuevoItem2->precio = $vuelo_vuelta->valor_ejecutivo;
        $nuevoItem2->subtotal= round($nuevoItem2->precio * $num_ejecutivo - $nuevoItem2->precio * $num_ejecutivo  * ($vuelo_vuelta->descuento/100));
        array_push($carrito->items, $nuevoItem2);
      }
      if($num_pc > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id_ida;
        $nuevoItem->nombre = $vuelo_ida->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->subcategoria = 'Vuelo Ida';
        $nuevoItem->tipo_pasaje = 'Primera Clase';
        $nuevoItem->precio = $vuelo_ida->valor_primera_clase;
        $nuevoItem->descuento = $vuelo_ida->descuento;
  	 		$nuevoItem->cantidad = $num_pc;
  	 		$nuevoItem->subtotal = round($nuevoItem->precio * $num_pc -  $nuevoItem->precio * $num_pc * ($vuelo_ida->descuento/100));
        $nuevoItem2 = clone $nuevoItem;
        array_push($carrito->items, $nuevoItem);
        $nuevoItem2->id = $id_vuelta;
        $nuevoItem2->nombre = $vuelo_vuelta->nombre_avion;
        $nuevoItem2->subcategoria = 'Vuelo vuelta';
        $nuevoItem2->precio = $vuelo_vuelta->valor_primera_clase;
        $nuevoItem2->subtotal= round($nuevoItem2->precio * $num_pc - $nuevoItem2->precio * $num_pc  * ($vuelo_vuelta->descuento/100));
        array_push($carrito->items, $nuevoItem2);
      }

      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
      }catch(Exception $e){
      return redirect('/vuelos')->with('failure', 'Hubo un error al agregar al carrito');
      }
    }

    public function addJointVueloPaqueteAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }
      try{

      if(Session::has('tipo_paquete')){
        $tipo_paquete = Session::get('tipo_paquete');
        Switch($tipo_paquete){
          case "2":
            $nombre_paquete = 'Vuelo + Auto';
            break;
          case "1":
            $nombre_paquete = 'Vuelo + Hotel';
            break;
        }
      }else{
        return redirect('/paquetes')->with('failure', 'Hubo un error al procesar el paquete!');
      }
      $id_ida = $request->input("id_ida");
      $id_vuelta = $request->input("id_vuelta");
      $tempData = html_entity_decode($request->input("pasajes"));
      $pasajes = json_decode($tempData, true);
      $num_turista= $pasajes['turista'];
      $num_ejecutivo = $pasajes['ejecutivo'];
      $num_pc = $pasajes['pc'];
      $vuelo_ida = \App\Models\Vuelo::findOrFail($id_ida);
      $vuelo_vuelta = \App\Models\Vuelo::findOrFail($id_vuelta);
      $id_paquete = $request->input('id_paquete');

      if($num_turista > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id_ida;
        $nuevoItem->id_paquete = $id_paquete;
        $nuevoItem->nombre = $vuelo_ida->nombre_avion;
        $nuevoItem->categoria = 'Paquete';
        $nuevoItem->tipo_paquete = $nombre_paquete;
        $nuevoItem->subcategoria = 'Vuelo ida';
        $nuevoItem->tipo_pasaje = 'Turista';
        $nuevoItem->precio = $vuelo_ida->valor_turista;
        $nuevoItem->descuento = $vuelo_ida->descuento;
  	 		$nuevoItem->cantidad = $num_turista;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_turista - $nuevoItem->precio * $num_turista  * ($vuelo_ida->descuento/100));
        $nuevoItem2 = clone $nuevoItem;
        array_push($carrito->items, $nuevoItem);
        $nuevoItem2->id = $id_vuelta;
        $nuevoItem2->nombre = $vuelo_vuelta->nombre_avion;
        $nuevoItem2->subcategoria = 'Vuelo vuelta';
        $nuevoItem2->precio = $vuelo_vuelta->valor_turista;
        $nuevoItem2->subtotal= round($nuevoItem2->precio * $num_turista - $nuevoItem2->precio * $num_turista  * ($vuelo_vuelta->descuento/100));
        array_push($carrito->items, $nuevoItem2);
      }
      if($num_ejecutivo > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id_ida;
        $nuevoItem->id_paquete = $id_paquete;
        $nuevoItem->nombre = $vuelo_ida->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->tipo_paquete = $nombre_paquete;
        $nuevoItem->subcategoria = 'Vuelo ida';
        $nuevoItem->tipo_pasaje = 'Ejecutivo';
        $nuevoItem->precio = $vuelo_ida->valor_ejecutivo;
        $nuevoItem->descuento = $vuelo_ida->descuento;
  	 		$nuevoItem->cantidad = $num_ejecutivo;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_ejecutivo - $nuevoItem->precio * $num_ejecutivo * ($vuelo_ida->descuento/100));
        $nuevoItem2 = clone $nuevoItem;
        array_push($carrito->items, $nuevoItem);
        $nuevoItem2->id = $id_vuelta;
        $nuevoItem2->nombre = $vuelo_vuelta->nombre_avion;
        $nuevoItem2->subcategoria = 'Vuelo vuelta';
        $nuevoItem2->precio = $vuelo_vuelta->valor_ejecutivo;
        $nuevoItem2->subtotal= round($nuevoItem2->precio * $num_ejecutivo - $nuevoItem2->precio * $num_ejecutivo  * ($vuelo_vuelta->descuento/100));
        array_push($carrito->items, $nuevoItem2);
      }
      if($num_pc > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id_ida;
        $nuevoItem->id_paquete = $id_paquete;
        $nuevoItem->nombre = $vuelo_ida->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->tipo_paquete = $nombre_paquete;
        $nuevoItem->subcategoria = 'Vuelo Ida';
        $nuevoItem->tipo_pasaje = 'Primera Clase';
        $nuevoItem->precio = $vuelo_ida->valor_primera_clase;
        $nuevoItem->descuento = $vuelo_ida->descuento;
  	 		$nuevoItem->cantidad = $num_pc;
  	 		$nuevoItem->subtotal = round($nuevoItem->precio * $num_pc -  $nuevoItem->precio * $num_pc * ($vuelo_ida->descuento/100));
        $nuevoItem2 = clone $nuevoItem;
        array_push($carrito->items, $nuevoItem);
        $nuevoItem2->id = $id_vuelta;
        $nuevoItem2->nombre = $vuelo_vuelta->nombre_avion;
        $nuevoItem2->subcategoria = 'Vuelo vuelta';
        $nuevoItem2->precio = $vuelo_vuelta->valor_primera_clase;
        $nuevoItem2->subtotal= round($nuevoItem2->precio * $num_pc - $nuevoItem2->precio * $num_pc  * ($vuelo_vuelta->descuento/100));
        array_push($carrito->items, $nuevoItem2);
      }
      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
    }catch(Exception $e){
      return redirect('/vuelos')->with('failure', 'Hubo un error al agregar al carrito');
    }
    }

    public function addVueloAlCarrito(Request $request){
      if (Session::has("carrito")){
  	 		$carrito = json_decode(Session::get("carrito"));
  	 	}else{
        //Se crea una clase vacia y se llena como el formato de arriba
    	 	$carrito = new \stdClass();
    	 	$carrito->precio = 0;
    	 	$carrito->items = [];
      }

      $id = $request->input("id");
      $num_turista = $request->input("turista");
      $num_ejecutivo = $request->input("ejecutivo");
      $num_pc = $request->input("primera_clase");

      $vuelo = \App\Models\Vuelo::findOrFail($id);

      if($num_turista > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id;
        $nuevoItem->nombre = $vuelo->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->subcategoria = 'Reservas';
        $nuevoItem->tipo_pasaje = 'Turista';
        $nuevoItem->precio = $vuelo->valor_turista;
        $nuevoItem->descuento = $vuelo->descuento;
  	 		$nuevoItem->cantidad = $num_turista;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_turista - $nuevoItem->precio * $num_turista * ($vuelo->descuento/100));
        array_push($carrito->items, $nuevoItem);
      }
      if($num_ejecutivo > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id;
        $nuevoItem->nombre = $vuelo->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->tipo_pasaje = 'Ejecutivo';
        $nuevoItem->precio = $vuelo->valor_ejecutivo;
        $nuevoItem->descuento = $vuelo->descuento;
  	 		$nuevoItem->cantidad = $num_ejecutivo;
  	 		$nuevoItem->subtotal= round($nuevoItem->precio * $num_ejecutivo - $nuevoItem->precio * $num_ejecutivo * ($vuelo->descuento/100));
        array_push($carrito->items, $nuevoItem);
      }
      if($num_pc > 0){
        $nuevoItem = new \stdClass();
        $nuevoItem->id = $id;
        $nuevoItem->nombre = $vuelo->nombre_avion;
        $nuevoItem->categoria = 'Vuelo';
        $nuevoItem->tipo_pasaje = 'Primera Clase';
        $nuevoItem->precio = $vuelo->valor_primera_clase;
        $nuevoItem->descuento = $vuelo->descuento;
  	 		$nuevoItem->cantidad = $num_pc;
  	 		$nuevoItem->subtotal = round($nuevoItem->precio * $num_pc - $nuevoItem->precio * $num_pc * ($vuelo->descuento/100));
        array_push($carrito->items, $nuevoItem);
      }
      $total = 0;
  	 	foreach ($carrito->items as $item) {
  	 		$total = $total + $item->subtotal;
  	 	}
  	 	$carrito->total = $total;
  	 	Session::put("carrito", json_encode($carrito));
    }

}
