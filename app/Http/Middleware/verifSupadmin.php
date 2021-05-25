<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Http\Request;

class verifSupadmin
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
        $user = DB::table('users')->where('id_professeur',session("LoggedUser"))->get();
        if($user[0]->supadmin!="1")
        {
            
           return back();
        }
        return $next($request);
    }
}
