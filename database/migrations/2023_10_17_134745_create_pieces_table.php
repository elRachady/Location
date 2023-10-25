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
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->string('num_piece');
            $table->foreignId('type_piece_id')->constrained('type_pieces');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peices', function (Blueprint $table){
            $table->dropForeign(['type_piece_id']);
            
        });

        Schema::dropIfExists('pieces');
    }
};
