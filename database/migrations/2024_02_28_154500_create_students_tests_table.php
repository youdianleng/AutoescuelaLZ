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
        Schema::create('students_tests', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("student_id");
            $table->unsignedBigInteger("test_id");
            $table->unsignedBigInteger("question_id");
            $table->unsignedBigInteger("is_correct");
            $table->unsignedBigInteger("start_date");
            $table->unsignedBigInteger("end_date");

            $table->foreign("student_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("test_id")->references("id")->on("tests")->onDelete("cascade");
            $table->foreign("question_id")->references("id")->on("questions")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_tests');
    }
};
