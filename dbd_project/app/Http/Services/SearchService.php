<?php

namespace App\Services;
use App\Models\Aeropuerto;
use App\Models\Vuelo;
use App\Models\Hotel;
use App\Models\Auto;
use App\Models\Actividad;

class SearchService {

  private $paisInicio;
  private $aeropuertoInicio;
  private $aeropuertosPartida = [];
  private $vuelosPartida = [];

  // public function __construct($paisInicio){
  //     $this->paisInicio = $paisInicio;
  //     $aeropuertos = Aeropuerto::where('pais', '=', $paisInicio)->pluck('cod_aeropuerto');
  //     $this->$aeropuertosPartida = $aeropuertos;
  //     $this->vuelosPartida = Vuelo::whereIn('aeropuerto_origen', $aeropuertos);
  // }
  public function __construct($aeropuertoInicio){
    $this->aeropuertoInicio = $aeropuertoInicio;
    //$aeropuertos = Aeropuerto::where('cod_aeropuerto', '=', $aeropuertoInicio)->pluck('cod_aeropuerto');
    //$this->$aeropuertosPartida = $aeropuertos;
    //$this->vuelosPartida = Vuelo::where('aeropuerto_origen', '=', $aeropuertoInicio)->get();
  }

  public function getPaisOrigen(){
    return $this->paisInicio;
  }

  public function getAeropuertosOrigen(){
    return $this->$aeropuertosPartida;
  }

  public function buscarHotelesPorCiudad($ciudad){
    $hoteles = Hotel::orderBy('precio_min_habitacion')->where('ciudad', '=', $ciudad)
    ->where('habitaciones_disponibles', '>=', 0)->paginate(6);
    return $hoteles;
  }

  public function buscarHotelesPorCiudadFecha($ciudad, $fecha_inicio, $fecha_fin, $num_habitaciones, $num_personas){
    $hoteles = Hotel::orderBy('precio_min_habitacion')
    ->where('ciudad', '=', $ciudad)
    ->where('habitaciones_disponibles', '>', 0)->paginate(6);
    return $hoteles;
  }

  public function buscarHotelesPorPais($pais){
    $hoteles = Hotel::orderBy('precio_min_habitacion')->where('pais', '=', $pais)
    ->where('habitaciones_disponibles', '>=', 0)->paginate(6);
    return $hoteles;
  }

  public function buscarAutosPorCiudad($ciudad){
    $autos = Auto::orderBy('precio_por_dia')->where('ciudad_arriendo', '=', $ciudad)->where('ya_reservado', false)->paginate(6);
    return $autos;
  }

  public function actividadesCiudad($ciudad){
    $actividades = Actividad::orderBy('valor_entrada')->where('ciudad', '=', $ciudad)
    ->paginate(6);
    return $actividades;
  }


  public function buscarVuelosPorPais($inicio, $destino){
    $aeropuertosInicio = Aeropuerto::where('pais', '=', $inicio)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('pais', '=', $destino)->pluck('cod_aeropuerto');
    $vuelos = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosInicio, $aeropuertosDestino){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosInicio)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino);
                    })->paginate(6);
    return $vuelos;
  }

  public function buscarVuelosSoloIda($inicio, $destino, $fechaSalida){
    $aeropuertosOrigen = Aeropuerto::where('ciudad', '=', $inicio)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('ciudad', '=', $destino)->pluck('cod_aeropuerto');
    $vuelos = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino, $fechaSalida){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosOrigen)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino)
                      ->whereDate('vuelos.hora_salida', '=', $fechaSalida);
                    })->paginate(6);
    return $vuelos;
  }

  public function getPaquetesVH($origen, $destino, $f_inicio, $f_fin, $num_personas){
    $aeropuertosOrigen = Aeropuerto::where('ciudad', '=', $origen)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('ciudad', '=', $destino)->pluck('cod_aeropuerto');
    $vuelosValidos = Vuelo::select('vuelos.id_vuelo')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino, $f_inicio){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosOrigen)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino)
                      ->whereDate('vuelos.hora_salida', '=', $f_inicio);
                    })->get();
    $paquetes = \App\Models\Paquete::whereIn('id_vuelo', $vuelosValidos)->get();
    return $paquetes;
  }

  //Se ocupan paises para buscar en paquetes
  public function getVuelosPaquete($origen, $destino, $f_inicio, $f_fin, $num_personas){
    $idVuelosEnPaquetes = \App\Models\Paquete::select('id_vuelo')->get();
    $aeropuertosOrigen = Aeropuerto::where('pais', '=', $origen)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('pais', '=', $destino)->pluck('cod_aeropuerto');
    $vuelosValidos = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino, $f_inicio){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosOrigen)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino)
                      ->whereDate('vuelos.hora_salida', '=', $f_inicio);
                    })->whereIn('vuelos.id_vuelo', $idVuelosEnPaquetes)->paginate(6);
    return $vuelosValidos;
  }

  // public function getAutosPaquete($id_vuelo, $num_personas){
  //   $autos = Auto::select('id_auto')->where('ciudad_arriendo', '=', $origen)
  //               ->where('cap_pasajeros', '>=', $num_personas)
  //               ->where('ya_reservado', '=', false)
  //               ->whereIn('id_auto')->get();
  //   $paquetes = \App\Models\Paquete::where();
  // }


  public function buscarVuelosIdaSinFecha($inicio, $destino){
    $aeropuertosOrigen = Aeropuerto::where('ciudad', '=', $inicio)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('ciudad', '=', $destino)->pluck('cod_aeropuerto');
    $vuelos = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosOrigen)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino);
                    })->paginate(6);
    return $vuelos;
  }

  public function buscarVuelosIdaVuelta($inicio, $destino, $fechaSalida, $fechaLlegada){
    $aeropuertosOrigen = Aeropuerto::where('ciudad', '=', $inicio)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('ciudad', '=', $destino)->pluck('cod_aeropuerto');
    $vuelosSalida = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino, $fechaSalida){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosOrigen)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino)
                      ->whereDate('vuelos.hora_salida', '=', $fechaSalida);
                    })->get();
    $vuelosLlegada = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino, $fechaLlegada){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosDestino)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosOrigen)
                      ->whereDate('vuelos.hora_llegada', '=', $fechaLlegada);
                    })->get();
    $vuelos = [];
    foreach($vuelosSalida as $vueloS){
      foreach($vuelosLlegada as $vueloL){
          $ida_vuelta = ['ida' => $vueloS, 'vuelta' => $vueloL];
          array_push($vuelos, $ida_vuelta);
      }
    }
    return $vuelos;
  }

  public function buscarVuelosIdaVueltaSinFecha($inicio, $destino){
    $aeropuertosOrigen = Aeropuerto::where('ciudad', '=', $inicio)->pluck('cod_aeropuerto');
    $aeropuertosDestino = Aeropuerto::where('ciudad', '=', $destino)->pluck('cod_aeropuerto');
    $vuelosSalida = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosOrigen)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosDestino);
                    })->get();
    $vuelosLlegada = Vuelo::orderBy('vuelos.valor_turista')
                    ->join('aeropuertos', function($join) use ($aeropuertosOrigen, $aeropuertosDestino){
                      $join->on('vuelos.aeropuerto_origen', '=', 'aeropuertos.cod_aeropuerto')
                      ->whereIn('vuelos.aeropuerto_origen', $aeropuertosDestino)
                      ->whereIn('vuelos.aeropuerto_destino', $aeropuertosOrigen);
                    })->get();
    $vuelos = [];
    foreach($vuelosSalida as $vueloS){
      foreach($vuelosLlegada as $vueloL){
          $ida_vuelta = ['ida' => $vueloS, 'vuelta' => $vueloL];
          array_push($vuelos, $ida_vuelta);
      }
    }
    return $vuelos;
  }
}
