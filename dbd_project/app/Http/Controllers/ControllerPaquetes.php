<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Vuelo;
use App\Models\Hotel;
use App\Models\Auto;
use App\Services\SearchService;

class ControllerPaquetes extends Controller
{

    function index(){
      return view('paquetes.paquete');
    }

    private $searchService;


    public function create(){
      $vuelos = Vuelo::all();
      return view('paquetes.crear-paquete')->with('vuelos', $vuelos);
    }

    public function seleccionarPaquete(Request $req, $tipo_paquete){
      switch($tipo_paquete){
        case 1:

        break;
        case 2:
          $req->session()->put('tipo_paquete', $tipo_paquete);
          //$vuelos = $this->buscarVuelosPaquete($req);
          return view('paquetes.paquete-vuelos');//->with('vuelos', $vuelos);
        break;
      }
    }

    public function seleccionarAutoPaquete(Request $req, $id_vuelo){
      $tipo_paquete = $req->session()->get('tipo_paquete');
      switch($tipo_paquete){
        case 1:
        break;
        case 2:
          $req->session()->put('id_vuelo_paquete', $id_vuelo);
          $autos = $this->buscarAutosPaquete($id_vuelo, 1);
          return view('paquetes.paquete-autos')->with('autos', $autos);
        break;
        default:
          return view('paquetes.paquete')->with('failure', 'Error al recibir datos de sesión, intente nuevamente');
      }
    }

    public function completarPaquete(Request $req, $id_auto){
      try{
      $tipo_paquete = $req->session()->get('tipo_paquete');
      switch($tipo_paquete){
        case '2':
          $id_vuelo = $req->session()->get('id_vuelo_paquete');
          $vuelo = Vuelo::findOrFail($id_auto);
          $id_paquete = Paquete::select('id_paquete')->where('id_vuelo', '=', $id_vuelo)->where('id_auto', '=', $id_auto)->first();
          $auto =  Auto::findOrFail($id_vuelo);
          return view('paquetes.completar-paquete')->with('vuelo', $vuelo)->with('auto', $auto)->with('id_paquete', $id_paquete['id_paquete']);
          break;
        default:
          return redirect('/paquetes')->with('failure', 'Error al completar el paquete, intente nuevamente');
      }
    }catch(Exception $e){
      return redirect('/paquetes')->with('failure', 'Error al completar el paquete, intente nuevamente');
    }
    }

    public function getHoteles(Request $params){
      $aeropuerto = \App\Models\Aeropuerto::select('ciudad')->where('cod_aeropuerto', '=', $params['destino'])->first();
      $hoteles = Hotel::where('ciudad', '=', $aeropuerto->ciudad)->get();
      return json_encode($hoteles);
    }

    public function getAutos(Request $params){
      $aeropuerto = \App\Models\Aeropuerto::select('ciudad')->where('cod_aeropuerto', '=', $params['destino'])->first();
      $autos = Auto::where('ciudad_arriendo', '=', $aeropuerto->ciudad)->get();
      return json_encode($autos);
    }

    public function buscarPaquetesVueloAuto(Request $request){
      $this->searchService = \App::make(SearchService::class);
      $paquetes = $this->searchService->getPaquetesVH($request['origen'], $request['destino'], $request['fecha_inicio'], $request['fecha_fin'], $request['num_personas']);
      $vuelos = $this->searchService->getVuelosPaquete($request['origen'], $request['destino'], $request['fecha_inicio'], $request['fecha_fin'], $request['num_personas']);
      return view('paquetes.paquete')->with('vuelos', $vuelos);
    }

    // function buscarVuelosPaquete(Request $request, $tipo_paquete){
    //   $this->searchService = \App::make(SearchService::class);
    //   $vuelos = $this->searchService->getVuelosPaquete($request['origen'], $request['destino'], $request['fechaPartida'], $request['fechaRegreso'], $request['num_personas']);
    //   return view('paquetes.paquete-vuelos')->with('vuelos', $vuelos)->with('tipo_paquete', $tipo_paquete);
    // }

    public function buscarVuelosPaquete(Request $request){
      $validate = $request->validate([
        'origen' => 'required|string',
        'destino' => 'required|string',
        'fechaPartida' => 'date|required_without:sinFecha',
        'fechaLlegada' => 'date|required_without:sinFecha'
      ]);
      $tipo_paquete = $request->session()->get('tipo_paquete');
      $origen = $request->input('origen');
      $destino = $request->input('destino');
      $fechaPartida = $request->input('fechaPartida');
      $fechaRetorno = $request->input('fechaLlegada');
      $checkIdaVuelta = $request->input('idaVuelta');
      $checkSinFecha = $request->input('sinFecha');
      $this->searchService = \App::make(SearchService::class);
      if(!empty($checkSinFecha) && !empty($checkIdaVuelta)){
        $vuelos = $this->searchService->buscarVuelosIdaVueltaSinFecha($origen, $destino);
        //return dd($vuelos);
        return view('paquetes.paquete-vuelos')->with('joint_vuelos', $vuelos)->with('tipo_paquete', $tipo_paquete);
      }else if(!empty($checkSinFecha)){
        $vuelos = $this->searchService->buscarVuelosIdaSinFecha($origen, $destino, $fechaPartida);
        return view('paquetes.paquete-vuelos')->with('vuelos', $vuelos)->with('tipo_paquete', $tipo_paquete);
      }else if(!empty($checkIdaVuelta)){
        $vuelos = $this->searchService->buscarVuelosIdaVuelta($origen, $destino, $fechaPartida, $fechaRetorno);
        //return dd($vuelos);
        return view('paquetes.paquete-vuelos')->with('joint_vuelos', $vuelos)->with('tipo_paquete', $tipo_paquete);
      }else{
        $vuelos = $this->searchService->buscarVuelosSoloIda($origen, $destino, $fechaPartida);
        return view('paquetes.paquete-vuelos')->with('vuelos', $vuelos)->with('tipo_paquete', $tipo_paquete);
      }
    }

    public function store(Request $request){
      $validate = $request->validate([
        'tipo_paquete' => 'required',
        'id_hotel' => 'required_if:tipo_paquete,1',
        'id_auto' => 'required_if:tipo_paquete,2',
        'id_vuelo' => 'required_if:tipo_paquete,1,2',
        'descripcion' => 'required|string'
      ]);
      try{
      $paquete = new Paquete();
      $paquete->tipo_paquete = $request['tipo_paquete'];
      switch($request['tipo_paquete']){
        case 1: //Vuelo + hotel
          $paquete->id_vuelo = $request['id_vuelo'];
          $paquete->id_hotel = $request['id_hotel'];
        break;
        case 2: //Vuelo + Auto
        $paquete->id_vuelo = $request['id_vuelo'];
        $paquete->id_auto = $request['id_auto'];
      }
      if(!empty($request['descuento'])){
          $paquete->descuento_paquete = $request['descuento'];
      }else{
        $paquete->descuento_paquete = 0;
      }
      $paquete->descripcion = $request['descripcion'];
      $paquete->save();
      return redirect('/paquetes')->with('success', 'Paquete creado con éxito');
    }catch(Exception $e){
        return redirect('/paquetes')->with('failure', 'Error al crear paquete')->with('errors', $e->toArray());
    }
    }

    // function nuevoPaquete(Request $request){
    //
    //   $paquete = ;
    //   $this->searchService = \App::make(SearchService::class);
    //   switch ($request->input('tipo_paquete')) {
    //     case 1:
    //       $paquete->save();
    //       $vuelos = $this->searchService->buscarVuelosPorPais($request->input('origen'), $request->input('destino'));
    //       return view('paquetes.paquete')->with('paquete', $paquete)->with('vuelos', $vuelos);
    //       break;
    //     case 2:
    //       $paquete->save();
    //       $vuelos = $this->searchService->buscarVuelosPorPais('Chile', 'Japón');
    //       return view('paquetes.paquete')->with('paquete', $paquete)->with('vuelos', $vuelos);
    //   }
    // }

    public function buscarVuelosIda(Request $request){
      $inicio = $request['inicio'];
      $destino = $request['destino'];
      $fechaP = $request['fechaPartida'];
      $vuelos = $this->searchService->buscarVuelosSoloIda($inicio, $destino, $fechaP);
      return view("vuelos.buscar-vuelos")->with('vuelos', $vuelos);
    }

    public function buscarVuelosIdaVuelta(Request $request){
      $this->searchService = \App::make(SearchService::class);
      $inicio = $request['origen'];
      $destino = $request['destino'];
      $fechaP = $request['fechaPartida'];
      $fechaL = $request['fechaLlegada'];
      $vuelos = $this->searchService->buscarVuelosIdaVuelta($inicio, $destino, $fechaP, $fechaL);
      return view("vuelos.buscar-vuelos")->with('vuelos', $vuelos);
    }

    // function buscarAutosPaquete(Request $request){
    //   $this->searchService = \App::make(SearchService::class);
    //   $autos = $this->searchService->getAutosPaquete($request['id_auto'], $request['num_personas']);
    //   return $autos;
    // }

    function buscarAutosPaquete($id_vuelo, $cap_personas){
      $id_autos = Paquete::select('id_auto')->where('id_vuelo', '=', $id_vuelo)->get();
      $autos = \App\Models\Auto::whereIn('id_auto', $id_autos)->where('cap_pasajeros', '>=', $cap_personas)->paginate(6);
      // $this->searchService = \App::make(SearchService::class);
      // $autos = $this->searchService->getAutosPaquete($request['id_auto'], $request['num_personas']);
      return $autos;
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
