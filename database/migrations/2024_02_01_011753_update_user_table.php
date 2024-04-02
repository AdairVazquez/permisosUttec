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
        Schema::table('users',function(Blueprint $table){
            $table->string('rol')->nullable();
            $table->string('imagen')->default('https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png');
            $table->integer('id_google')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('rol');
            $table->dropColumn('imagen');
            $table->dropColumn('id_google');
        });
    }
};
