<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('admins',compact('usuarios'));
    }

    public function asignar(Request $req){
        $usuarios = User::find($req->id);
        $usuarios -> rol = 'Admin';
        $usuarios -> save();
        return redirect()->route("admins");
    }
}
