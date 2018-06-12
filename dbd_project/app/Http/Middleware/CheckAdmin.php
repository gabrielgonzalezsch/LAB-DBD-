<?php

namespace App\Http\Middleware;

use App\Models\Usuarios;
use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = \Auth::id();
        $user = Usuarios::find($id);
        if($user['tipo_usuario'] != "administrador"){
          return redirect("/")->with('failure', 'No tiene privilegios para ingresar a esta página');
        }
        return $next($request);
    }
}
