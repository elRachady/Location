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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->longText('description');
            $table->string('autres_details');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tarif_id')->constrained('tarifications')->onDelete('cascade');
            $table->foreignId('localisation_id')->constrained('localisations')->onDelete('cascade');
            $table->foreignId('domaine_id')->constrained('domaines')->onDelete('cascade');
            $table->timestamps();
        });

        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colis', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['tarif_id']);
            $table->dropForeign(['localisation_id']);
            $table->dropForeign(['domaine_id']);
            
        });

        Schema::dropIfExists('colis');
    }
};
