<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    //
    protected $table = 'autos';
    protected $primaryKey = 'id_auto';

    protected $fillable = ['patente','compania','tipo_auto','modelo_auto','pais','ciudad','calle','capacidad','precio_por_dia','descripcion_auto','detalles_auto','descuento','precio_normal']

   	public function vuelos(){
  		return $this->BelongstoMany(Transaccion::class, 'ID_transaccion');
  	}

  	public function precio(Request $req){
  		$id = $r['ID_auto'];
  		$cant_dias = $r['cant_dias'];
  		$auto = Auto::findOrFail($id);
  		return $auto->precio_por_dia*$cant_dias - $auto->descuento;
  	}

  	public function ciudadAuto(){
  		return $this->ciudad
  	}
}
