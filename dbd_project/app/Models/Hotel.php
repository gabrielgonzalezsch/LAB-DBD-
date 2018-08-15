<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Habitacion;

class Hotel extends Model
{
  protected $table = 'hoteles';
  protected $primaryKey = 'id_hotel';

  public function habitaciones(){
    return $this->hasMany(Habitacion::class, 'id_hotel');
  }
}
