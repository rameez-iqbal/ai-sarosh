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
        Schema::create('gallery_highlights', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('day_slug');
            $table->string('heading');
            $table->json('images');
            $table->foreignId('gallery_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_highlights');
    }
};
