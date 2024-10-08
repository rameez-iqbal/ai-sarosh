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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->json('banner_images')->nullable();
            $table->json('gallery_images')->nullable();
            $table->string('post_url')->nullable();
            $table->string('recording_url')->nullable();
            $table->enum('type',['conference','workshop'])->default('conference');
            $table->foreignId('library_type_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
