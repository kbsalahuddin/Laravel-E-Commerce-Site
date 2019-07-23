<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class ECommMiddleware
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
      if (Session::get('adminId')){
        return $next($request);
      }else{
        return redirect('/admin');
      }
    }
}
