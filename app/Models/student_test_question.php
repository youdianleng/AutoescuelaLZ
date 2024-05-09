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
        "option_Selected",
        "is_correct"
    ];

    public function test_question(){
        return $this->belongsTo(Student::class, 'student_test_questions');
    }
    
    public function question_option(){
        return $this->belongsTo(Option::class, 'question_id');
    }

    public function question_question(){
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function option_question(){
        return $this->hasOne(Option::class, 'id', 'option_Selected');
    }

}
