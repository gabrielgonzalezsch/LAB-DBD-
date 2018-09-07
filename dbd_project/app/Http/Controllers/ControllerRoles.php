<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class ControllerRoles extends Controller
{
    public function otorgarRol(Request $req){
      $rol = $_POST['rol'];
      $id = $_POST['usuario']; //Equivale a $req->input('usuario') o $req['usuario']
      $usuario = Usuario::where('id_usuario', '=', $id)->first();
      $usuario->tipo_usuario = $rol;
      $usuario->save();
      return;
    }

    public function revocarRol(Request $req){
      //$rol = $_POST('rol');
      $id = $_POST['usuario']; //Equivale a $req->input('usuario') o $req['usuario']
      $usuario = Usuario::where('id_usuario', '=', $id)->first();
      $usuario->tipo_usuario = "Invitado";  //Hacer arrays para roles, cuando haya mas roles
      $usuario->save();
      return;
    }

    public function administrar(){
      $usuarios = Usuario::all();
      return view('admin')->with('usuarios', $usuarios);
    }
}
