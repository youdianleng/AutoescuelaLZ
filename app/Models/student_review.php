<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_review extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'review'
    ];
}
