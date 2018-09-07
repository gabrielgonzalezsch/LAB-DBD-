<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Traslado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'id_traslado';
    protected $table = 'traslados';

    public function chofer(){
    	return $this->belongsTo(\App\Models\Chofer::class, 'id_chofer');
    }

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_traslado', 'id_traslado', 'id_transaccion');
    }

}
