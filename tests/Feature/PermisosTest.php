<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PermisosTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_carga(): void
    {
        $registrarP = $this->post(route('guardar.permiso'),
        ["id"=>'0',
        'id_usuario'=>'1',
        "fecha"=>'14/06/2024',
        "motivo"=>'No puedo ajsaja']);
        $registrarP->assertStatus(200)->assertSee('Ok');
    }

    /*public function test_baja():void
    {
        $bajaP= $this->post(route('eliminar.permiso'),["id"=>'8','id_usuario'=>'1']);
        $bajaP->assertStatus(200)->assertSee('ok');
    }*/

    public function test_actualizacion():void
    {
        $actualizarP = $this->post(route('guardar.permiso'),["id"=>'9','id_usuario'=>'1',"fecha"=>'14/06/2024',"motivo"=>'No puedo ajsajsssa']);
        $actualizarP->assertStatus(200)->assertSee('Ok');
    }

    public function test_autorizacion():void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $autorizarP = $this->actingAs($user)->post(route('permiso.autorizar'),["id"=>'9','nombre'=>'Alejandro Vazquez','fecha'=>'2024-06-14','motivo'=>'No puedo ajsajsssa']);
        $autorizarP->assertStatus(200);
    } 

    public function test_rechazo():void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $autorizarP = $this->actingAs($user)->post(route('rechazar.permiso'),["id"=>'9','nombre'=>'Alejandro Vazquez','fecha'=>'2024-06-14','motivo'=>'No puedo ajsajsssa']);
        $autorizarP->assertStatus(200); 
    }
}
