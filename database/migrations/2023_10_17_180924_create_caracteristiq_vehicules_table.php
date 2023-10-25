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
        Schema::create('caracteristiq_vehicules', function (Blueprint $table) {
            $table->id();
            $table->boolean('est_obligatoire')->default(1);
            $table->string('nom');
            $table->foreignId('type_vehicule_id')->constrained('type_vehicules')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('caracteristiq_vehicules', function (Blueprint $table){
            $table->dropForeign(['type_vehicule_id']);
            
        });

        Schema::dropIfExists('caracteristiq_vehicules');
    }
};
