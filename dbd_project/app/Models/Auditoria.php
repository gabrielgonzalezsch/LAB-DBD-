<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Audit
{
    protected $table = 'auditoria';
    protected $primaryKey = 'id_log';
    protected $timestamps = false;
    protected $dates = ['fecha_realizado'];

    public __construct($tabla){
      $this->nombre_tabla = $tabla;
      $this->fecha_realizado = \Carbon\Carbon::now();
    }
}
