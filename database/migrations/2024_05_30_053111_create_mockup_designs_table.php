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
        Schema::create('mockup_designs', function (Blueprint $table) {
            $table->id();
            $table->string("mokup_id");
            $table->string("template_id");
            $table->string("design_id");
            $table->string("mokup_current_width");
            $table->string("mokup_current_height");
            $table->string("position_x");
            $table->string("position_y");
            $table->string("design_width");
            $table->string("design_height");
            $table->string("designed_mokup")->nullable();
            $table->tinyInteger("mokup_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mockup_designs');
    }
};
