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
        Schema::create('propriete_colis', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('caracteristiq_coli_id')->constrained('caracteristiq_colis')->onDelete('cascade');
            
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propriete_colis', function (Blueprint $table){
            $table->dropForeign("caracteristiq_coli_id");
            
        });
        Schema::dropIfExists('propriete_colis');
    }
};
