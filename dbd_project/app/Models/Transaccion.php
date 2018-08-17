|<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $primaryKey = "id_transaccion";
  protected $table = "transacciones";
  public $timestamps = false;

  public function usuario(){
    return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario');
  }

  public function vuelos(){
    return $this->belongsToMany(\App\Models\Vuelo::class, 'compra_pasaje', 'id_transaccion', 'id_vuelo');
  }

  public function habitaciones(){
     return $this->belongsToMany(\App\Models\Habitacion::class, 'compra_habitacion', 'id_transaccion', 'id_habitacion');
  }


  public function autos(){
     return $this->belongsToMany(\App\Models\Auto::class, 'reserva_auto', 'id_transaccion', 'id_auto');
  }
}