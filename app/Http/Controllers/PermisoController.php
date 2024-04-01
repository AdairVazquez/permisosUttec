<?php

namespace App\Http\Controllers;
use App\Models\Division;
use App\Models\Modificaciones;
use App\Models\Permiso;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermisoController extends Controller 
{
    public function store(Request $req){
            if($req->id != 0){
                $permiso = Permiso::find($req->id);
            } else {
                $profesor = Profesor::where('usuario_id',$req->id_usuario)->first();
                $permiso = new Permiso();
                $permiso->estado = 'P';
                $permiso->id_profesor = $profesor->id;
            }
            $permiso->fecha = $req->fecha;
            $permiso->motivo = $req->motivo;
            $ahora = now()->format('Y-m-d H:i:s');
            $permiso->save();
            $ip_address = $req->ip();
            
            $id_per = Permiso::where('created_at','=',$ahora)->value('id');
            if($req->id != 0){
                $mensaje = 'Actualización del permiso con el id '. $req->id;
                $tipo = 'Actualización';
                $idd = $req->id_usuario;
            }else{
                $mensaje ='Creación del permiso con el id '.$id_per;
                $tipo = 'Creación';
                $idd = $req->id_usuario;
            }

            Modificaciones::create([
            'id_usuario' => $idd,
            'movimiento' => $mensaje,
            'tipo' => $tipo,
            'ip_address' => $ip_address,
        ]);
            return "Ok";
    }

    public function Autorizar(Request $req){
        $user = Auth::user();
        $permis = Permiso::find($req->id);
        $nombreP = $req -> nombre; 
        $permis->id_profesor = $permis->id_profesor;
        $permis->fecha = $req->fecha;
        $permis->motivo = $req->motivo;
        $permis->estado = 'A';
        $permis->save();
        $ip_address = $req->ip();
        Modificaciones::create([
            'id_usuario' => $user -> id,
            'movimiento' => 'Actualización del estatus del permiso con el id '.$req->id. ' autorizado',
            'tipo' => 'Actualización',
            'ip_address' => $ip_address,
        ]);
        $permiso = Permiso::join('profesor','profesor.id','=','permisos.id_profesor')
        ->select('permisos.*','profesor.nombre')
        ->get();
        return view('permisos', compact('permiso'));
    }

    public function Rechazar(Request $req){
        $user = Auth::user();
        $permis = Permiso::find($req->id);
        $observacion = $req -> observacion;
        $permis->estado = 'R';
        $permis->observaciones = $observacion;
        $permis->save();
        $ip_address = $req->ip();
        Modificaciones::create([
            'id_usuario' => $user -> id,
            'movimiento' => 'Actualización del estatus del permiso con el id '.$req->id. ' rechazado',
            'tipo' => 'Actualización',
            'ip_address' => $ip_address,
        ]);
        $permiso = Permiso::join('profesor','profesor.id','=','permisos.id_profesor')
        ->select('permisos.*','profesor.nombre')
        ->get();
        return view('permisos', compact('permiso'));
    }

    public function RegresaPer(Request $req){
        $permisos = Permiso::join('profesor','profesor.id','=','permisos.id_profesor')->join('division','profesor.division_id','=','division.id')
        ->where('permisos.id', $req->id)
        ->select('permisos.*','profesor.nombre','division.nombre as division')
        ->get();
        return view('permiso',compact('permisos'));
    }
  

    public function list(Request $req){
        $permisos = Permiso::join('profesor','profesor.id','=','permisos.id_profesor')
        ->where('profesor.usuario_id', $req->id_usuario)
        ->select('permisos.*','profesor.nombre')
        ->get();
        return $permisos;
    }

    public function autorize(Request $req){
        $permiso = Permiso::find($req->id);
        $permiso -> estado = $req -> estado;
        $permiso -> observaciones = $req -> observaciones;
        $permiso -> save();
        return 'ok';
    }

    public function index(Request $req){
        $permiso = Permiso::find($req -> id);
        return $permiso;
    }

    public function delete(Request $req){
        $id = $req->id;
        $permiso = Permiso::find($req->id);
        $user = $req -> id_usuario;
        $permiso -> delete();
        $ip_address = $req->ip();
        Modificaciones::create([
            'id_usuario' => $user,
            'movimiento' => 'Eliminación del permiso con el id '.$id,
            'tipo' => 'Eliminación',
            'ip_address' => $ip_address,
        ]);
        return 'ok';
    }

    public function listP(){
        $permiso = Permiso::join('profesor','profesor.id','=','permisos.id_profesor')
        ->select('permisos.*','profesor.nombre')
        ->get();
        return view('permisos', compact('permiso'));
    }



}
