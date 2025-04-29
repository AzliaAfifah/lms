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
        Schema::create('lecture_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('lecture_id')->unsigned();
            $table->foreign('lecture_id')->references('id')->on('course_lectures')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['1','0'])->default('0');
            $table->timestamp('checked_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'lecture_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_checklists');
    }
};
