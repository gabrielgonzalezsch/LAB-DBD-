<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'tipo_usuario', 'banco_origen', 'fondos_disponibles', 'numero_cuenta_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //protected $table = 'usuarios';
    protected $primaryKey = 'ID_usuario';

    protected function isAdmin(){
      if($this->tipo_usuario == 'administrador'){
        return true;
      }else
        return false;
    }
}
