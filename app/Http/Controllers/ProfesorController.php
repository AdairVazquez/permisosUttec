<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Modificaciones;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\ProfesorEnc;
use App\Models\Puesto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfesorController extends Controller
{
    public function view(Request $req){
        if($req->id == 0){
        $profesor = new ProfesorEnc();
        }else{
        $profesor = Profesor::find($req->id);
        }

        $users  = User::all();
        $divisiones = Division::all();
        $puestos= Puesto::all();

        return view('profesor',compact('profesor','users','divisiones','puestos'));
    }

    public function delete(Request $req, $id){
        $profesor = Profesor::find($id);
        $profesor->delete();
        $ip_address = $req->ip();
        $user = Auth::user();
        Modificaciones::create([
            'id_usuario' => $user->id,
            'movimiento' => 'Eliminación de el profesor con el id '.$id,
            'tipo' => 'Eliminación',
            'ip_address' => $ip_address,
        ]);
        return redirect()->route("profesores");
    }

    public function actualiza(Request $req){
            $profesor = ProfesorEnc::find($req->id);
            $numStr = (string) $req -> txtNumero;
            $profesor -> numero = $numStr;
            $profesor -> nombre = $req->txtNombre;
            $profesor -> horas_asignadas = $req -> txtHrs;
            $profesor -> dias_economicos = $req -> txtDias;
            $profesor -> usuario_id = $req -> usuario;
            $profesor -> puesto_id = $req -> puesto;
            $profesor -> division_id =$req -> division;
            $nomPuesto = Puesto::where('id','=',$req->puesto)->value('nombre');
            $usuario = User::find($req->usuario);
            $usuario -> rol = $nomPuesto;
            $usuario -> save();
            $profesor->save();
            $ip_address = $req->ip();
            $user = Auth::user();
            Modificaciones::create([
            'id_usuario' => $user -> id,
            'movimiento' => 'Modificación del profesor con el id '.$req->id,
            'tipo' => 'Creación',
            'ip_address' => $ip_address,
            ]);
            return redirect()->route("profesores");
    }


    public function store(Request $req){
        $profesor = new ProfesorEnc();    
        $numStr = (string) $req -> txtNumero;
        $profesor -> numero = $numStr;
        $profesor -> nombre = $req -> txtNombre;
        $profesor -> horas_asignadas = $req -> txtHrs;
        $profesor -> dias_economicos = $req -> txtDias;
        $profesor -> usuario_id = $req -> usuario;
        $profesor -> puesto_id = $req -> puesto;
        $profesor -> division_id =$req -> division;
        $profesor->save();
        $nuevo = Profesor::latest()->first();
        $id_nuevo = $nuevo->id;
        $user = Auth::user();
        $ip_address = $req->ip();
        Modificaciones::create([
            'id_usuario' => $user -> id,
            'movimiento' => 'Creación del profesor con el id '.$id_nuevo,
            'tipo' => 'Creación',
            'ip_address' => $ip_address,
        ]);

        return redirect()->route("profesores");
    }

    public function index(){
        $profesores = Profesor::join('puesto','profesor.puesto_id','=','puestos.id')
        ->select('profesor.*','puestos.nombre as nombre_puesto')
        ->get();
        return view('profesores',compact('profesores'));
    }

}
