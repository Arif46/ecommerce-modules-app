<?php

namespace App\Http\Middleware;

use App\AppConfig;
use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="web")
    {

        // Check guest user
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('404');
            }
        }


        // Check admin user
        if(Auth::user()->type == AppConfig::USER_ROLE_TYPE_SUPER_ADMIN || Auth::user()->type == AppConfig::USER_ROLE_TYPE_ADMIN){
            return $next($request);    
        }else{
            return redirect()->guest('404');
        }
        
    }
}
