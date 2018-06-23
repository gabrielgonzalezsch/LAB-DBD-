<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vuelos extends Model
{
    protected $table = 'vuelos';
    protected $primaryKey = 'ID_vuelo';
    protected $dates = ['hora_salida', 'hora_llegada'];
}
