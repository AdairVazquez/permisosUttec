<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PuestoTest extends TestCase
{
    /*
    public function test_carga():void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $registrarPuesto = $this->actingAs($user)->post(route('puesto.guardar'),
        [
            'txtCodigo' => 2332,
            'txtNombre' => 'Test',
        ]);
        $registrarPuesto->assertStatus(302)->assertRedirect(route('puestos'));
    }*/

    public function test_actualiza():void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $registrarPuesto = $this->actingAs($user)->post(route('puesto.guardar'),
        [
            'id' => 6,
            'txtCodigo' => 2332,
            'txtNombre' => 'TestActualizado',
        ]);
        $registrarPuesto->assertStatus(302)->assertRedirect(route('puestos'));
    }

    public function test_baja():void
    {
        $user = User::where('email', 'alan.adaair@gmail.com')->first();
        $eliminaP = $this->actingAs($user)->Delete(route('puesto.eliminar',['id'=>4]));
        $eliminaP->assertStatus(302)->assertRedirect(route('puestos'));
    }
}
