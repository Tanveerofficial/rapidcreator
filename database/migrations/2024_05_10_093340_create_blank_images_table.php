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
        Schema::create('blank_images', function (Blueprint $table) {
            $table->id();
            $table->string("position_x");
            $table->string("position_y");
            $table->string("container_width");
            $table->string("container_height");
            $table->string("image_width");
            $table->string("image_height");
            $table->longText("image_path");
            $table->string("added_from");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blank_images');
    }
};
