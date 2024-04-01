<?php

namespace App\Http\Controllers;

use App\Models\Modificaciones;
use App\Models\Permiso;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PuestoController extends Controller
{
    public function view(Request $req){
        if($req->id == 0){
        $puesto = new Puesto();
        }else{
        $puesto = Puesto::find($req->id);
        }
        return view('puesto',compact('puesto'));
    }

    public function delete(Request $req,$id){
        $idd = $id;
        $puesto = Puesto::find($id);
        $puesto->delete();
        $ip_address = $req->ip();
            $user = Auth::user();
            Modificaciones::create([
            'id_usuario' => $user->id,
            'movimiento' => 'Eliminación del puesto con el id '.$id,
            'tipo' => 'Eliminación',
            'ip_address' => $ip_address,
        ]);
        return redirect()->route("puestos");
    }


    public function store(Request $req){
        if($req->id == 0){
            $puesto = new Puesto();
            }else{
            $puesto = Puesto::find($req->id);
            $ip_address = $req->ip();
            $user = Auth::user();
            Modificaciones::create([
            'id_usuario' => $user->id,
            'movimiento' => 'Actualización del puesto con el id '.$req->id,
            'tipo' => 'Actualización',
            'ip_address' => $ip_address,
        ]);
        }
        $puesto -> codigo = $req -> txtCodigo;
        $puesto -> nombre = $req -> txtNombre;
        $puesto->save();
        if($req->id == 0){
            $ip_address = $req->ip();
            $user = Auth::user();
            $nuevo = Puesto::latest()->first();
            $id_nuevo = $nuevo->id;
            Modificaciones::create([
            'id_usuario' => $user->id,
            'movimiento' => 'Creacion de el puesto con el id '.$id_nuevo,
            'tipo' => 'Creación',
            'ip_address' => $ip_address,
        ]);
        }

        return redirect()->route("puestos");
    }

    public function index(){
        $puestos = Puesto::all();
        return view('puestos',compact('puestos'));
    }
    

}
