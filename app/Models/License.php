<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "description",
    ];

    // Get the student license
    public function students(){
        return $this->belongsToMany(Student::class, 'license_student');
    }
}
