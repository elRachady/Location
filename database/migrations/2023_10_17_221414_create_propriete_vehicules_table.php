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
        Schema::create('propriete_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('caracteristiq_id')->constrained('caracteristiq_vehicules')->onDelete('cascade');
            $table->foreignId('vehicule_id')->constrained('vehicules')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propriete_vehicules', function (Blueprint $table){
            $table->dropForeign(['caracteristiq_id']);
            $table->dropForeign(['vehicule_id']);
            
        });
        Schema::dropIfExists('propriete_vehicules');
    }
};
