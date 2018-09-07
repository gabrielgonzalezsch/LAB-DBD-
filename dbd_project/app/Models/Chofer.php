<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Chofer extends Model implements Auditable
{
  use \OwenIt\Auditing\Auditable;

  protected $table = 'choferes';
  protected $primaryKey = 'id_chofer';
  
}
