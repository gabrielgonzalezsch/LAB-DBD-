<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';
    protected $guarded = ['id_habitacion'];
    //protected $fillable = [*]);

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_habitacion', 'id_habitacion', 'id_transaccion');
    }
}
