<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'difficulty',
        'errors',
    ];

    public function question()
    {
        return $this->hasMany(Question::class, 'question_id');
    }

}

