<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_test_question extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_id",
        "test_id",
        "question_id",
        "is_correct"
    ];

    public function test_question(){
        return $this->belongsTo(Student::class, 'student_test_questions');
    }
}
