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
        Schema::create('fishes', function (Blueprint $table) {
            $table->id('fish_id');
            $table->string('fish_code');
            $table->string('fish_variety');
            $table->foreignId('breeder_id')->constrained('breeders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fish_image');
            $table->date('fish_birth_date');
            $table->date('fish_import_date');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('fish_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fishes');
    }
};