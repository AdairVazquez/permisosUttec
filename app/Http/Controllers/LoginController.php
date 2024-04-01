<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    public function login(Request $req){
        if($req -> email == '' && $req -> password==''){
            $arr = array(
                'acceso' => '',
                'token' =>'', 
                'error'=>'CAMPOS VACIOS, POR FAVOR ESCRIBE ALGO!!');
            return json_encode($arr);
        }else if($req -> email == ''){
            $arr = array(
                'acceso' => '',
                'token' =>'', 
                'error'=>'CAMPO DEL CORREO ELECTRONICO ESTA VACIO, POR FAVOR ESCRIBE ALGO');
            return json_encode($arr);
        }else if($req -> password==''){
            $arr = array(
                'acceso' => '',
                'token' =>'', 
                'error'=>'CAMPO DE LA CONTRASEÑA ESTA VACIO, POR FAVOR ESCRIBE ALGO');
            return json_encode($arr);
        }
            if(
                Auth::attempt(['email' => $req -> email, 'password' => $req -> password])
            ){
                $user = Auth::user();
                $token = $user ->createToken('app')->plainTextToken;
                $arr = array(
                    'acceso' => 'Ok',
                    'token' =>$token,
                    'nombre' => $user->name,
                    'id_usuario' => $user->id,
                    'error'=>'');
                return json_encode($arr);
            }else{
                $arr = array(
                    'acceso' => '',
                    'token' =>'', 
                    'error'=>'NO EXISTEN USUARIO O CONTRASEÑA');
                return json_encode($arr);
            }
    }
}
