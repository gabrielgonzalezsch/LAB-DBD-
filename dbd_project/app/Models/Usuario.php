<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
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
    protected $primaryKey = 'id_usuario';

    public function esAdmin(){
      if($this->tipo_usuario == 'administrador'){
        return true;
      }else
        return false;
    }

    public function transacciones(){
      return $this->hasMany(\App\Models\Transaccion::class, 'id_transaccion');
    }

    public function rol(){
      return $this->tipo_usuario;
    }
}
