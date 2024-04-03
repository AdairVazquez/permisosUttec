<?php

namespace App\Http\Middleware;

use App\Models\LoginSucc;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogSucc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $user = Auth::user();
            // Registra el inicio de sesión
            $ip = 'asd';
           
            LoginSucc::create([
                'user_id' => $user->id,
                'fecha' => now(),
                'ip_adderss' => $ip,
                'tipo' => 'Login',
            ]);
        }else{
            $user = Auth::user();
            // Registra el inicio de sesión
            LoginSucc::create([
                'user_id' => $user->id,
                'fecha' => now(),
                'ip_adderss' => $ip,
                'tipo' => 'Fallido',
            ]);
        }
        return $response;
    }

    public function getName()
    {
        return 'log.succ';
    }
}
