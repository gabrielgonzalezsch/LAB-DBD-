<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Vuelo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'vuelos';
    protected $primaryKey = 'id_vuelo';
    protected $dates = ['hora_salida', 'hora_llegada'];

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_pasaje', 'id_vuelo', 'id_transaccion');
    }
}
