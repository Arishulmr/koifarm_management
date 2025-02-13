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
        Schema::create('awards', function (Blueprint $table) {
            $table->id('award_id');
            $table->string('award_code');
            $table->foreignId('fish_id')->constrained('fishes', 'fish_id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('award_image');
            $table->integer('award_placement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};