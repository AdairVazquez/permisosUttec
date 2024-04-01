<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesor', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); 
            $table->string('numero');
            $table->string('nombre');
            $table->integer('horas_asignadas');
            $table->integer('dia_econom_c');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('puesto_id');
            $table->unsignedBigInteger('division_id');

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('puesto_id')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('division_id')->references('id')->on('division')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor');
    }
};
