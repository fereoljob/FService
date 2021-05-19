<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Http\Request;

class verifAdmin
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
        $user = DB::table('users')->where('id_professeur',session("LoggedUser"))->first();
        if($user->admin!="1")
        {
            echo "<script>";
            echo "alert('Vous n'avez le privilège d'Administrateur');";
            echo "</script>";
            return back();
        }
        return $next($request);
    }
}
