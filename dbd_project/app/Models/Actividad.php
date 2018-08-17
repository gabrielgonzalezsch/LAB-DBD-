<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Actividad extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    public function transaccion(){
    	return $this->belongsToMany('App\Transaccion');
    }
}
