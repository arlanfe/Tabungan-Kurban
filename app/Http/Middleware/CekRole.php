<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CekRole
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
        if(Auth::user()->status == 'super_admin'){
            return $next($request);
        }
            return abort(404);
    }
 
    private function CekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}
