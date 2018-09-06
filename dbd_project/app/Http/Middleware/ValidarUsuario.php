<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Usuario;

class ValidarUsuario
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
      if(\Auth::check()){
        $usuario = Usuario::findOrFail(\Auth::id());
        if(!empty($usuario)){
          if($usuario->username = $request->route('username')){
            return $next($request);
          }
          return route('/');
        }else{
          return route('/');
        }
      }else{
        return route('/');
      }
    }
}
