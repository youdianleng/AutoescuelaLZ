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
        "is_correct"
    ];


}
