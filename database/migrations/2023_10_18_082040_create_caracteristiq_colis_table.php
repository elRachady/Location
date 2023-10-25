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
        Schema::create('caracteristiq_colis', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('est_obligatoire')->default();
            $table->foreignId('type_coli_id')->constrained('type_colis')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('caracteristiq_colis', function (Blueprint $table){
            $table->dropForeign("type_coli_id");
            
        });
        Schema::dropIfExists('caracteristiq_colis');
    }
};
