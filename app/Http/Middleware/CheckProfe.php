<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckProfe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rol = Auth::user()->rol;
        if($rol==="Directivo" || $rol==="Admin"){
            return $next($request);
        }else{ 
            abort(403,'No tienes permitido ingresar a esta paina por que no tienes los roles necesarios ajajaja estas bien menso, deberias tener los roles ve y dile al admin que te los ponga para que puedas seguir navengando amigo :D');
        }
    }
}
