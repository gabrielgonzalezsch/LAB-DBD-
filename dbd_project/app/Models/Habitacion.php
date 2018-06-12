<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'ID_habitacion';
    protected $guarded = ['ID_habitacion'];
    //protected $fillable = [*]);
}
