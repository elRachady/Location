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
        Schema::create('expeditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colis_id')->constrained('colis');
            $table->foreignId('transporteur_id')->constrained('transporteurs')->onDelete('cascade');
            $table->foreignId('statu_expedition_id')->constrained('statu_expeditions')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expeditins', function (Blueprint $table){
            $table->dropForeign(['colis_id']);
            $table->dropForeign(['transporteur_id']);
            $table->dropForeign(['statu_expedition_id']);
        });
        Schema::dropIfExists('expeditions');
    }
};
