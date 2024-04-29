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
        Schema::create('student_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("student_id");
            $table->foreign("student_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->string("review");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_reviews');
    }
};
