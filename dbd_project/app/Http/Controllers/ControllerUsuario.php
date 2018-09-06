<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class ControllerUsuario extends Controller
{
    public function eliminarUsuario($id){
      $usuario = Usuario::findOrFail($id);
      $usuario->delete();
      return;
      // return redirect('/admin')->with('success', 'Usuario eliminado con éxito');
      // }catch(Exception $e){
      //   return redirect('/admin')->with('failure', 'Error al eliminar usuario')->with('errors', $e->toArray());
      // }
    }

    public function perfilUsuario($username){
      $usuario = Usuario::where('username', '=', $username);
      if(!empty($usuario)){
        return view('usuario')->with('usuario', $usuario);
      }else{
        return redirect('/')->with('failure', 'No tiene permisos para acceder o el usuario no existe')->with('errors', $e->toArray());
      }
    }
}
