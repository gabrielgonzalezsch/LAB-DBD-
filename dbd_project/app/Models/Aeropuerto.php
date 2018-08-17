<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Aeropuerto extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $table = 'aeropuertos';
  protected $primaryKey = 'cod_aeropuerto';
  public $incrementing = false;
}
