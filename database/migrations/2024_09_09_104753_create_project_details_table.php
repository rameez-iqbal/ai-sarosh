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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->string('pi')->nullable();
            $table->string('co_pi')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('timeline')->nullable();
            $table->longText('project_teams')->nullable();
            $table->string('url')->nullable();
            $table->string('name')->nullable();
            $table->longText('about_description')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
