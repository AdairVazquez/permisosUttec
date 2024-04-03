<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginSucc;
use App\Models\Modificaciones;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        // Obtiene la dirección IP del usuario
        
        $ip_address = $request->ip();

        if(empty($ip_address)){
            $ip_address = 'null';
        }else{
            $ip_address = $request->ip();
        }

        LoginSucc::create([
            'user_id' => $user->id,
            'fecha' => now(),
            'ip_address' => $ip_address,
            'tipo' => 'Exitoso',
        ]);

    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
