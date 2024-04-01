<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\AuthRouteMethods;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->rol=="Admin"){
            return $next($request);
        }else{
        abort(403,'No tienes permitido ingresar a esta paina por que no tienes los roles necesarios ajajaja estas bien menso, deberias tener los roles ve y dile al admin que te los ponga para que puedas seguir navengando amigo :D');
        }
    }
}
