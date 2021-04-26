<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class verifAuthentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has("LoggedUser"))
        {
            return redirect('/')->with('Echec','Vous devez être connecté');
        }
        return $next($request);
    }
}
