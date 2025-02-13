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
        Schema::create('item_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('tag')->nullable();
            $table->text('icon_menu')->nullable();
            $table->string('permission')->nullable();
            $table->enum('status', ["enabled", "disabled"])->nullable()->default('enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_menus');
    }
};
