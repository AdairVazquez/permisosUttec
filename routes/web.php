<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PuestoController;
use App\Models\Puesto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('presentacion', [PresentacionController::class,'index']);
//Route::get('login', [FormController::class,'index']);
Route::post('validate', [FormController::class,'login'])->name('login.validate')->middleware('auth');
Route::get('/ip', [FormController::class,'showDashboard'])->name('ip.address')->middleware('auth');
//crear controlador //php make:controller NombreControlador//
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


//RUTAS DE DIVISION
Route::get('/division/nueva',[DivisionController::class,'view'])->name('division.nueva')->middleware('auth','role');
Route::delete('division/eliminar/{id}',[DivisionController::class,'delete'])->name('division.eliminar')->middleware('auth','role');
Route::post('/division/guardar',[DivisionController::class,'store'])->name('division.guardar')->middleware('auth','role');
Route::get('/divisiones',[DivisionController::class,'index'])->name('divisiones')->middleware('auth','role','role');
  
//RUTAS DE PUESTO
Route::get('/puesto/nueva',[PuestoController::class,'view'])->name('puesto.nueva')->middleware('auth','role');
Route::delete('puesto/eliminar/{id}',[PuestoController::class,'delete'])->name('puesto.eliminar')->middleware('auth','role');
Route::post('/puesto/guardar',[PuestoController::class,'store'])->name('puesto.guardar')->middleware('auth','role');
Route::get('/puestos',[PuestoController::class,'index'])->name('puestos')->middleware('auth','role','role');

//RUTAS DE PROFESORES
Route::get('/profesor/nueva',[ProfesorController::class,'view'])->name('profesor.nueva')->middleware('auth','roleP');
Route::post('/profesor/actualizar',[ProfesorController::class,'actualiza'])->name('profesor.actualizar')->middleware('auth','roleP');
Route::delete('profesor/eliminar/{id}',[ProfesorController::class,'delete'])->name('profesor.eliminar')->middleware('auth','roleP');
Route::post('/profesor/guardar',[ProfesorController::class,'store'])->name('profesor.guardar')->middleware('auth','roleP');
Route::get('/profesores',[ProfesorController::class,'index'])->name('profesores')->middleware('auth','roleP');


//RUTAS DE PERMISOS
Route::get('/permiso/rechazar',[PermisoController::class,'RegresaPer'])->name('reg.permiso')->middleware('auth','role');
Route::post('permiso/autorizar',[PermisoController::class,'autorizar'])->name('permiso.autorizar')->middleware('auth','role');
Route::post('/permiso/rechazado',[PermisoController::class,'Rechazar'])->name('rechazar.permiso')->middleware('auth','role');
Route::get('permisos',[PermisoController::class, 'listP'])->name('permisos','role');

//RUTAS DE LOGS
Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('auth','role')->name('errores'); 
Route::get('/logsin',[FormController::class,'logins'])->name('logins')->middleware('auth','role');
Route::get('/logsmv',[FormController::class,'movimientos'])->name('logMovimientos')->middleware('auth','role');

//ADMINS
Route::get('/admins',[AdministradorController::class,'index'])->name('admins')->middleware('auth','role');
Route::get('/admins/nueva',[AdministradorController::class,'asignar'])->name('admin.nueva')->middleware('auth','role');


//LOGIN GOOGLE
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/callback', [FormController::class,'google_log']);
