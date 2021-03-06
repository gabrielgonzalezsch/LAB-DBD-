<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Auto extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'autos';
    protected $primaryKey = 'id_auto';
    protected $dates = ['hora_compra', 'inicio_reserva', 'fin_reserva'];
    public $timestamps = false;

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'reserva_auto', 'id_auto', 'id_transaccion');
    }
}
