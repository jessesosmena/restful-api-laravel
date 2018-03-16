<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // import Auth/aliases

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // Register Class Admin in Kernel.php => protected $routeMiddleware = [] use  'admin' => \App\Http\Middleware\Admin::class,
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isAdmin()){ // If user is logged in & admin column is == 1
            return $next($request); // redirect to admin page
        }
        return redirect('/'); // If not will be redirected homepage
    }
}
