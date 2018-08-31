<?php

namespace App\Services;
use App\Models\Aeropuerto;
use App\Models\Vuelo;

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
}
