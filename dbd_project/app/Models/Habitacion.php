<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = 'habitaciones';
    protected $primaryKey = 'id_habitacion';
    protected $guarded = ['id_habitacion'];
    protected $fillable = ['nombre_hotel','pais','ciudad','valoracion_habitacion','capacidad','precio_por_noche','detalles_habitacion','descuento','precioNormal'];

    //relaciones

    public function hotel(){
    	return $this->hasOne(Hotel::class, 'ID_hotel');
    }
}
