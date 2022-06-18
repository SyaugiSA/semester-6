<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next, $access)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

        // if (Auth::user()->role == 'admin') {
        //     return $next($request);
        // }

        // return redirect('admin')->with('error', "You don't have admin access.");
        if (in_array(Auth::user()->role, explode('|', $access))) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
        // return $next($request);
    }
}
