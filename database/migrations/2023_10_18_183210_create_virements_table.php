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
        Schema::create('virements', function (Blueprint $table) {
            $table->id();
            $table->string('montant');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('transporteur_id')->constrained('transporteurs')->onDelete('cascade');
            $table->timestamps();
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('virements', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['transporteur_id']);
        });
        Schema::dropIfExists('virements');
    }
};
