<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Modificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
    public function view(Request $req){
        if($req->id == 0){
        $division = new Division();
        }else{
        $division = Division::find($req->id);
        }
        return view('division',compact('division'));
    }

    public function delete(Request $req,$id){
        $nombre = Division::where('id','=',$id)->value('nombre');
        $division = Division::find($id);
        $division->delete();

        

        $ip_address = $req->ip();
        $user = Auth::user();
        Modificaciones::create([
            'id_usuario' => $user -> id,
            'movimiento' => 'Eliminacion de la division '.$nombre,
            'tipo' => 'Eliminación',
            'ip_address' => $ip_address,
        ]);

        return redirect()->route("divisiones");
    }


    public function store(Request $req){
        if($req->id == 0){
            $division = new Division();
            }else{
            $division = Division::find($req->id);
        }
        $division -> codigo = $req -> txtCodigo;
        $division -> nombre = $req -> txtNombre;
        $division->save();
        $ip_address = $req->ip();
        
        if($req->id == 0){
           $mensaje = 'Creación de division '.$req -> txtNombre; 
           $tipo = 'Creación';
        }else{
            $mensaje = 'Actualización de division '.$req -> txtNombre;
            $tipo = 'Actualización';
        }

        $user = Auth::user();
        Modificaciones::create([
            'id_usuario' => $user -> id,
            'movimiento' => $mensaje,
            'tipo' => $tipo,
            'ip_address' => $ip_address,
        ]);

        return redirect()->route("divisiones");
    }

    public function index(){
        $divisiones = Division::all();
        return view('divisiones',compact('divisiones'));
    }
}
