<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Habitacion extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';
    protected $guarded = ['id_habitacion'];
    //protected $fillable = [*]);

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_habitacion', 'id_habitacion', 'id_transaccion');
    }
}
