<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ControllerCarrito extends Controller
{
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

    public function agregarAlCarrito(Request $request){
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
        "subtotal" : "60000"
        },
        ...
      ],
      "total" = "60000";
      }
    }
    */
    // Se recuperan los valores del array data enviado como request por AJAX
    $id = $request->input("id");
    $categoria = $request->input("categoria");
    $nombre = $request->input("nombre");
    $cantidad = $request->input("cantidad");
    //Se crea una clase vacia y se llena como el formato de arriba
	 	$carrito = new \stdClass();
	 	$carrito->precio = 0;
	 	$carrito->items = [];
    //Se busca en la DB el id del producto a agregar al carro segun la categoria
    switch ($categoria) {
      case 'Habitación':
        $item_elegido = \App\Models\Habitacion::find($id);
        break;
      case 'Auto':
        $item_elegido = Auto::find($id);
        break;
      case 'Vuelo':
        $item_elegido = Vuelo::find($id);
        break;
      case 'Traslado':
        $item_elegido = Traslado::find($id);
        break;
      //Agregar vuelo, traslado, auto, etc
    }
	 	if (Session::has("carrito")){
	 		$carrito = json_decode(Session::get("carrito"));
	 	}
	 	$item_existe = false;
	 	// if (count($carrito->items)>0)
	 	// {
	 	// 	foreach ($carrito->items as $item)
	 	// 	{
	 	// 		if($item->id == $item_elegido->id_habitacion || $item->id == $item_elegido->id_vuelo
    //     $item->id == $item_elegido->id_auto || $item->id == $item_elegido->id_traslado) //hay que generalizar esto para disntintos nombres de id
	 	// 		{
	 	// 			$item_existe=true;
	 	// 			$item->cantidad = $item->cantidad + $cantidad;
	 	// 			$item->subtotal=$item->cantidad * $item->precio;
	 	// 		}
	 	// 	}
	 	// }
	 	if ($item_existe == false) {
      $nuevoItem = new \stdClass();
      $nuevoItem->id = $id;
      $nuevoItem->categoria = $categoria;
      $nuevoItem->precio = $item_elegido->precio_por_noche;
      $nuevoItem->nombre = $nombre;
	 		$nuevoItem->cantidad = $cantidad;
	 		$nuevoItem->subtotal= $item_elegido->precio_por_noche * $cantidad;
      array_push($carrito->items, $nuevoItem);
	 	}
	 	$total = 0;
	 	foreach ($carrito->items as $item) {
	 		$total = $total + $item->subtotal;
	 	}
	 	$carrito->total = $total;
	 	Session::put("carrito", json_encode($carrito));
	 	return json_encode($carrito);
	 }
}
