<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Student extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "name",
        "surname",
        "password",
        "teacher_id",
        "license_id",
        "email",
        'address'
    ];

    // get the teacher of student
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'students_teachers');
    }

    // Get the license of student
    public function licenses()
    {
        return $this->belongsToMany(License::class, 'students_licenses');
    }

    // Get the question that student make in test
    public function student_test_question(){
        return $this->hasMany(student_test_question::class, 'student_id');
    }

    // Get the test that the student did 
    public function test(){
        return $this->hasMany(Test::class, 'students_tests');
    }

    // Get this student in User Table
    public function User(){
        return $this->belongTo(User::class, 'user_id');
    }

    // Decide the side where we want to place the image
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images/students')
            ->useFallbackUrl('/images/placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder.jpg'));
    }

    // Resize the Meida width and height
    public function registerMediaConversions(Media $media = null): void
    {
        if (env('RESIZE_IMAGE') === true) {

            $this->addMediaConversion('resized-image')
                ->width(env('IMAGE_WIDTH', 300))
                ->height(env('IMAGE_HEIGHT', 300));
        }
    }

    // Get all the review have when the id of student existe in the table student_review
    public function review_student(){
        return $this->hasMany(student_review::class,"student_id");
    }

}
