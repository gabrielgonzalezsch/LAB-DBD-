<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Usuarios extends Model
{
    //
    protected $table = 'usuarios';
    protected $primaryKey = 'ID_usuario';
    //protected $connection = 'pgsql';
    //$db = DB::connection($connection)
}
