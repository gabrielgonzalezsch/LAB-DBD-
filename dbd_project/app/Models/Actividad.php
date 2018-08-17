<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Actividad extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad';

    public function transacciones(){
       return $this->belongsToMany(App\Models\Transaccion::class, 'compra_actividad', 'id_actividad', 'id_transaccion');
    }
}
