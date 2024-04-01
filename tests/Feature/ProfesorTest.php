<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfesorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /*public function test_carga(): void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $registrarP = $this->actingAs($user)->post(route('profesor.guardar'),[
            'txtNumero' => '1234567890',
            'txtNombre' => 'Test',
            'txtHrs'    => 40,
            'txtDias'   => 2,
            'usuario'   => 4,
            'puesto'    => 4,
            'division' => 10,
        ]);
        $registrarP->assertStatus(302)->assertRedirect(route('profesores'));
    }*/

    public function test_actualiza(): void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $actualizarP = $this->actingAs($user)->post(route('profesor.actualizar'),[
            'id' => 11,
            'txtNumero' => '1234567890',
            'txtNombre' => 'TestActualizado',
            'txtHrs'    => 43,
            'txtDias'   => 2,
            'usuario'   => 4,
            'puesto'    => 4,
            'division' => 10,
        ]);
        $actualizarP->assertStatus(302)->assertRedirect(route('profesores'));
    }

    /*public function test_elimina():void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $eliminaP = $this->actingAs($user)->Delete(route('profesor.eliminar',['id'=>12]));
        $eliminaP->assertStatus(302)->assertRedirect(route('profesores'));
    }*/
}
