<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aeropuertos extends Model
{
  protected $table = 'aeropuertos';
  protected $keyType = 'cod_aeropuerto';
  public $incrementing = false;

  protected $fillable = ['pais','ciudad','longitud','latitud'];

  //relaciones

  public function vuelos(){
  	return $this->hasMany(Vuelos::class, 'ID_vuelo');
  }


  //funciones
  public function ciudadAeropuerto(){
  	return $this->ciudad
  }

  public function paisAeropuerto(){
  	return $this->pais
  }
}
