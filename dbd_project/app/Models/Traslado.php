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
    	return $this->hasOne(\App\Models\Chofer::class, 'id_chofer');
    }

}
