<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WebSellermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "web")
    {
        // Check guest user
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('404');
            }
        }


        // Check admin seller
        if (Auth::user()->type === 'seller' && Auth::user()->status === 'pending') {
            return redirect()->route('seller.editOtherProfileInfo');
        }

        if (Auth::user()->type ==='seller') {
            return $next($request);
        } else {
            return redirect()->guest('404');
        }
    }
}
