<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $table = 'vuelos';
    protected $primaryKey = 'id_vuelo';
    protected $dates = ['hora_salida', 'hora_llegada'];

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_pasaje', 'id_vuelo', 'id_transaccion');
    }
}
