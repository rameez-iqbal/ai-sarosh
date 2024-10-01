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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('image')->nullable();
            $table->string('heading')->nullable();
            $table->string('sub_heading')->nullable();
            $table->longText('description')->nullable();
            $table->enum('type',['page','section'])->default('page');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
