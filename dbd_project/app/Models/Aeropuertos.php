<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aeropuertos extends Model
{
  protected $table = 'aeropuertos';
  protected $primaryKey = 'cod_aeropuerto';
  public $incrementing = false;
}
