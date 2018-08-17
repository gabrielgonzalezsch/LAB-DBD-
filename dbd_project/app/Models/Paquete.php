<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';
    protected $primaryKey = 'id_paquete';
    protected $timestamps = false;

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_paquete', 'id_paquete', 'id_transaccion');
    }
}
