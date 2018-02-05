<?php

namespace App\Http\Middleware;

use Closure;

class RolMiddleware{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next, $rol){
      //Revision del rol de usuario
      //Los rols son:
      // A: Admin
      // B: Empleado B
      // C: Empleado C
      if ( $request->user()->rol != $rol ){
        if ($request->ajax()) {
          return response('Unauthorized.', 401);
        } else {
          return redirect('/login');
        }
      }
      return $next($request);
    }
}
