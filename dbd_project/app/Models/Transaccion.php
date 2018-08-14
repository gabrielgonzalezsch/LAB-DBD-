<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
  protected $primaryKey = "id_transaccion";
  protected $table = "transacciones";
  public $timestamps = false;

  public function usuario(){
    return $this->belongsTo(\App\Models\Usuarios::class, 'id_usuario');
  }

  public function vuelos(){
    return $this->belongsToMany(\App\Models\Vuelo::class, 'compra_pasaje', 'id_transaccion', 'id_vuelo');
  }

  public function habitaciones(){
     return $this->belongsToMany(\App\Models\Habitacion::class, 'compra_habitacion', 'id_transaccion', 'id_habitacion');
  }
}
