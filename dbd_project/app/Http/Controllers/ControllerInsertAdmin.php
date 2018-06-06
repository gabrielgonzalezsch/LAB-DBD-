<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class ControllerInsertAdmin extends Controller
{

    function insert(Request $req){

        /*$this->validator($req, [
        'username' => 'required',
        'password' => 'required',
        'email' =>'required'
      ]);*/
        $username = $req->input('username');
        $password = $req->input('password');
        $email = $req->input('email');

        $array = array(
        'tipo_usuario'=>'administrador',
        'banco_origen'=>NULL,
        'numero_cuenta_usuario'=>NULL,
        'fondos_disponibles'=>99999999,
        'username'=>$username,
        'email'=>$email,
        'password'=>$password,
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s')
        );

        Usuarios::insert($array);
        echo "Success!";
    }

    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }*/
}
