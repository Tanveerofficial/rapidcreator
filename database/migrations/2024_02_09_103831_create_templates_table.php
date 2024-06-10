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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string("template_picture")->default(1);
            $table->date('date');
            $table->string('container_position_top');
            $table->string('container_position_left');
            $table->string('container_width');
            $table->string('container_height');
            $table->string('input_position_top');
            $table->string('input_position_left');
            $table->string('input_width');
            $table->string('input_height');
            $table->string('input_font_size');
            $table->string("added_from");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
