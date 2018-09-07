<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';
    protected $primaryKey = 'id_paquete';
    public $timestamps = false;

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_paquete', 'id_paquete', 'id_transaccion');
    }
    
    public function vuelo(){
      return $this->hasOne(App\Models\Vuelo::class. 'id_vuelo');
    }
    public function habitacion(){
      return $this->hasOne(App\Models\Habitacion::class, 'id_habitacion');
    }
    public function auto(){
      return $this->hasOne(App\Models\Auto::class, 'id_auto');
    }
}
