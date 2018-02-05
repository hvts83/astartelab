<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Subnavigation;

class CheckAcceso{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      $flag = false;
      $url = "/" . str_replace("/index", "", $request->path() );
      $verificacion =  Subnavigation::select('subnavigation.id', 'subnavigation.link')
        ->join('user_navigation', 'subnavigation.id', '=', 'user_navigation.subnavigation_id')
        ->where('tipo', '=', $request->user()->rol)
        ->get();

      foreach ($verificacion as $ver) {
        if ( $url ==  $ver->link   ) {
          $flag = true;
        }
      }

      if ($flag == true) {
        return $next($request);
      }else{
        return response('Unauthorized.', 403);
      }
    }
}
