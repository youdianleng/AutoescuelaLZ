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
            $table->unsignedBigInteger("is_correct");
            $table->string("level");

            $table->foreign("student_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->foreign("test_id")->references("id")->on("tests")->onDelete("cascade");
            $table->timestamps();
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
