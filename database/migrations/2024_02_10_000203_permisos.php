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
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); 
            $table->date('fecha');
            $table->string('estado');
            $table->string('motivo');
            $table->string('observaciones')->nullable();
            $table->unsignedBigInteger('id_profesor');

            $table->foreign('id_profesor')->references('id')->on('profesor')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
