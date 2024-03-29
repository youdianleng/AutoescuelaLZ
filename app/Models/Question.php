<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'difficulty',
        'carnet',
        'test_id'
    ];

    public function test() {
        return $this->belongsToMany(Test::class);
    }

    public function options() {
        return $this->hasMany(Option::class);
    }
}
