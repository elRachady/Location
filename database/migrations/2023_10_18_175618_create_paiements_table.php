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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('montant');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('colis_id')->constrained('colis')->onDelete('cascade');
            $table->foreignId('type_paiement_id')->constrained('type_paiements')->onDelete('cascade');
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
            $table->dropForeign(['user_id']);
            $table->dropForeign(['colis_id']);
            $table->dropForeign(['paiement_id']);
        });
        Schema::dropIfExists('paiements');
    }
};
