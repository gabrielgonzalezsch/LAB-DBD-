<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Habitacion;

class Hotel extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $table = 'hoteles';
  protected $primaryKey = 'id_hotel';

  public function habitaciones(){
    return $this->hasMany(Habitacion::class, 'id_hotel');
  }
}
