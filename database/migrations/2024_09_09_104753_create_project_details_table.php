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
            $table->string('pi');
            $table->string('co_pi');
            $table->string('timeline');
            $table->longText('project_teams');
            $table->string('url');
            $table->string('about_project');
            $table->longText('about_description');
            $table->string('bg_color');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('countries');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
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
