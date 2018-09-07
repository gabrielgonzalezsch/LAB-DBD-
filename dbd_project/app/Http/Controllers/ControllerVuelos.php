<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use Carbon\Carbon;
use App\Services\SearchService;

class ControllerVuelos extends Controller
{
  public function index(){
      $vuelos = Vuelo::orderBy('valor_turista', 'asc')->paginate(6); //Cambiar a ordenarlos segun criterios
      return view('vuelos.buscar-vuelos')->with('vuelos', $vuelos);
  }

  public function create(){
      return view('vuelos.insertar-vuelo');
  }

  public function store(Request $req){

    try{
      $num_vuelo = $req->input('n_avion');
      $aerolinea = $req->input('aerolinea');
      $a_origen = $req->input('a_origen');
      $a_destino = $req->input('a_destino');
      $h_salida = $req->input('hora_salida');
      $h_llegada = $req->input('hora_llegada');
      $hora_salida = $h_salida;
      $hora_llegada = $h_llegada;
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

  public function showJointVuelo($id_ida, $id_vuelta){
    try{
    $vuelo_ida = Vuelo::findOrFail($id_ida);
    $vuelo_vuelta = Vuelo::findOrFail($id_vuelta);
    $dateTimeSalida = $vuelo_ida->hora_salida;
    $dateTimeLlegada = $vuelo_ida->hora_llegada;
    $tiempoViaje = number_format($this->timeDiff($dateTimeSalida, $dateTimeLlegada), 1);
    $tiempoViaje = $tiempoViaje." horas";
    $joint_vuelo = ['ida' => $vuelo_ida, 'vuelta' => $vuelo_vuelta];
    //echo "Horas: ".$tiempoViaje;
    return view('vuelos.detalle-vueloIdaVuelta')->with('joint_vuelo', $joint_vuelo)->with('horas', $tiempoViaje);
    }catch(Exception $e){
      return redirect('/vuelos')->with('errors', $e->toArray())->with('failure', 'Error, vuelos no encontrados');
    }
  }

  function timeDiff($firstTime,$lastTime){
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);
    $timeDiff=($lastTime-$firstTime)/3600;
    return $timeDiff;
  }

  public function edit($id){
      try{
        $vuelo = Vuelo::find($id);
        return view('vuelo.modificar')->with('vuelo',$vuelo);
      }
      catch(Exception $e){
        echo "error";
      }
  }

  public function update(Request $request, $id){
    //no se esta guardando nada
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
  }

  public function buscarVuelos(Request $request){
    $validate = $request->validate([
      'origen' => 'required|string',
      'destino' => 'required|string',
      'fechaPartida' => 'date|required_without:sinFecha',
      'fechaLlegada' => 'date|required_without:sinFecha'
    ]);
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
      return view('vuelos.buscar-vuelos')->with('joint_vuelos', $vuelos);
    }else if(!empty($checkSinFecha)){
      $vuelos = $this->searchService->buscarVuelosIdaSinFecha($origen, $destino, $fechaPartida);
      return view('vuelos.buscar-vuelos')->with('vuelos', $vuelos);
    }else if(!empty($checkIdaVuelta)){
      $vuelos = $this->searchService->buscarVuelosIdaVuelta($origen, $destino, $fechaPartida, $fechaRetorno);
      //return dd($vuelos);
      return view('vuelos.buscar-vuelos')->with('joint_vuelos', $vuelos);
    }else{
      $vuelos = $this->searchService->buscarVuelosSoloIda($origen, $destino, $fechaPartida);
      return view('vuelos.buscar-vuelos')->with('vuelos', $vuelos);
    }
  }

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

  public function destroy($id){
    $vuelo = Vuelo::find($id);
    $vuelo->delete();
  }
}
