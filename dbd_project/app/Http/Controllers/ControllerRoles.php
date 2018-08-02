<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class ControllerRoles extends Controller
{
    public function otorgarRol(Request $req){
      $rol = $_POST['rol'];
      $nombre = $_POST['usuario']; //Equivale a $req->input('usuario') o $req['usuario']
      $usuario = Usuarios::where('username', $nombre)->first();
      $usuario->tipo_usuario = $rol;
      $usuario->save();
      return redirect('/admin')->with('success', 'Roles otorgados');
    }

    public function revocarRol(Request $req){
      $rol = $_POST('rol');
      $nombre = $_POST('usuario'); //Equivale a $req->input('usuario') o $req['usuario']
      $usuario = Usuarios::where('username', $nombre)->first();
      $usuario->tipo_usuario = "";  //Hacer arrays para roles, cuando haya mas roles
      $usuario->save();
      return redirect('/admin')->with('success', 'Roles revocados');
    }
}
