<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students_tests extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_id",
        "test_id",
        "is_correct",
        "level"
    ];

    //Get the level of the test
    public function test_level(){
        return $this->belongsTo(Test::class,"student_id");
    }

}
