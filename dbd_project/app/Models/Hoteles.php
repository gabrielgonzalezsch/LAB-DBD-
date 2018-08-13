|<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Habitaciones;

class Hoteles extends Model
{
  protected $table = 'hoteles';
  protected $primaryKey = 'ID_hotel';

  public function habitaciones(){
  	
  }
}