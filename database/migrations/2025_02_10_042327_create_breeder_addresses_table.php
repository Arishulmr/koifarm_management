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
        Schema::create('breeder_addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->string('address_province');
            $table->string('address_city');
            $table->string('address_subdistrict');
            $table->string('address_ward');
            $table->string('address_street');
            $table->string('address_postal');
            $table->string('address_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breeder_addresses');
    }
};