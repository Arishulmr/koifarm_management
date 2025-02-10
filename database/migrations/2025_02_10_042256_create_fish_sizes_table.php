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
        Schema::create('fish_sizes', function (Blueprint $table) {
            $table->id('size_id');
            $table->foreignId('fish_id')->constrained('fishes')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('fish_size');
            $table->integer('fish_weight');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish_sizes');
    }
};