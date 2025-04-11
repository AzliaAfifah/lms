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
        Schema::create('instructor_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('instructor_id');
            $table->string('degree');
            $table->string('field_of_study');
            $table->string('university_name');
            $table->string('graduation_year');
            $table->string('organization_name')->nullable();
            $table->string('position')->nullable();
            $table->string('subject_taught')->nullable();
            $table->string('years_experience')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('description')->nullable();
            $table->string('language');
            $table->string('curriculum_vitae');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructor_profiles');
    }
};
