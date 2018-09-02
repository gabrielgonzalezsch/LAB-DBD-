<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Vuelo;
use App\Models\Hotel;
use App\Models\Auto;
use App\Services\SearchService;

class ControllerPaquete extends Controller
{

    function index(){
      return view('paquetes.paquete');
    }

    private $searchService;
    //
    // function __construct(SearchService $service){
    //   $this->SearchService = $service;
    // }

    function nuevoPaquete(Request $request){
      $paquete = new Paquete();
      $this->searchService = \App::make(SearchService::class);
      switch ($request->input('tipo_paquete')) {
        case 1:
          $paquete->tipo_paquete = 1;
          $paquete->descripcion = "Paquete de vuelo mas hotel";
          $paquete->save();
          $vuelos = $this->searchService->buscarVuelosPorPais($request->input('origen'), $request->input('destino'));
          return view('paquetes.paquete')->with('paquete', $paquete)->with('vuelos', $vuelos);
          break;
        case 2:
          $paquete->tipo_paquete = 2;
          $paquete->descripcion = "Paquete de vuelo mas arriendo auto";
          $paquete->save();
          $vuelos = $this->searchService->buscarVuelosPorPais('Chile', 'Japón');
          return view('paquetes.paquete')->with('paquete', $paquete)->with('vuelos', $vuelos);
      }
    }

    function addVueloPaquete($id_paquete, $id_vuelo){
      try{
          $vuelo = \App\Models\Vuelo::findOrFail($id_vuelo);
          $paquete = Paquete::findOrFail($id_paquete);
          $paquete->vuelo()->associate($id_vuelo);
          $paquete->save();
          return true;
      }catch(Exception $e){
        return false;
      }
    }

    function addHabitacionPaquete($id_paquete, $id_habitacion){
      try{
          $habitacion = \App\Models\Habitacion::findOrFail($id_habitacion);
          $paquete = Paquete::findOrFail($id_paquete);
          $paquete->habitacion()->associate($id_habitacion);
          $paquete->save();
          return true;
      }catch(Exception $e){
        return false;
      }
    }

    function addAutoPaquete($id_paquete, $id_auto){
      try{
          $auto = \App\Models\Auto::findOrFail($id_auto);
          $paquete = Paquete::findOrFail($id_paquete);
          $paquete->auto()->associate($id_auto);
          $paquete->save();
          return true;
      }catch(Exception $e){
        return false;
      }
    }
}
