<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogSucc;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Logins;
use App\Models\LoginSucc;
use App\Models\Modificaciones;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }

    public function login(Request $req){    
        $user = Form::where('txtUsername','=',$req->txtUsuario) ->where('txtContraseña','=',$req->txtContraseña)->first();
        if($user){
            $id_user = User::where('email',$req -> txtUsuario)->select('id')->get();
            $ip_address = $req->ip();
            $tipo = "Login";
            LoginSucc::create([
                'user_id' => $id_user,
                'fecha' => now(),
                'ip_address' => $ip_address,
                'tipo'=> 'Login',
            ]);

            return 'ok';
            
        }else{
            $id_user = User::where('email',$req -> txtUsuario)->select('id')->get();
            $ip_address = $req->ip();
            $tipo = "Login";
            LoginSucc::create([
                'user_id' => $id_user,
                'fecha' => now(),
                'ip_address' => $ip_address,
                'tipo'=> 'Fallido',
            ]);
            return "Datos incorrectisimos!!";
        }

        return "Usuario: ". $req->txtUsuario . " Contraseña: ". $req->txtContraseña;

  }
  
  public function logins(Request $req)
  {
    $logins = Logins::join('users','inicio_ses.user_id','=','users.id')->select('inicio_ses.*','users.email as emailUs')->get();
    return view('logSesiones',compact('logins'));
  }

  public function movimientos(Request $req)
  {
    $logmv = Modificaciones::join('users','modificaciones.id_usuario','=','users.id')->select('modificaciones.*','users.name as nombreUsuario')->get();
    return view('logMovimientos',compact('logmv'));
  }



  public function google_log(Request $req){
    $user_google = Socialite::driver('google')->stateless()->user();
    //dd($user_google);
    $id = $user_google->id;
    $nombre = $user_google->name;
    $email = $user_google->email;
    $img = $user_google->avatar;
    $us = User::where('id_google','=',$id)->first();
    if($us){
        $id_us = User::where('email',$email)->value('id');
        $tipo = 'Google';
        $ip_address = $req->ip();
        $user = User::where('email', $email)->first();
        LoginSucc::create([
            'user_id' => $id_us,
            'fecha' => now(),
            'ip_adderss' => $ip_address,
            'tipo'=> 'Login Google',
        ]);
        Auth::login($user);
    }else{
        $usuario = new User();
        $usuario -> id_google = $id;
        $usuario -> name = $nombre;
        $usuario -> email = $email;
        $usuario -> imagen = $img;
        $usuario -> password = 'null';
        $usuario -> save();
        $ip_address = $req->ip();
        $id_us = User::where('id_google','=',$id)->value('id');
        Modificaciones::create([
            'id_usuario' => $id_us,
            'movimiento' => 'Creacion del usuario '.$nombre,' por medio de google',
            'tipo' => 'Creaion',
            'ip_address' => $ip_address,
        ]);
    }
    return redirect()->route('home');
  }



}