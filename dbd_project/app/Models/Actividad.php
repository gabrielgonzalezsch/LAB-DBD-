<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    public function transaccion(){
    	return $this->belongsToMany('App\Transaccion');
    }
}

