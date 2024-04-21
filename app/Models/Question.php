<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Question extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;


    protected $fillable = [
        'question',
        'difficulty',
        'carnet',
        'test_id'
    ];

    // Get the test where this question is asigned
    public function test() {
        return $this->belongsToMany(Test::class);
    }

    // Get the options of this question
    public function options() {
        return $this->hasMany(Option::class);
    }


    public function student_test_questions(){
        return $this->hasMany(student_test_question::class, 'test_id');
    }

    // Set the place where we want to place the image
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images/Question')
            ->useFallbackUrl('/images/placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder.jpg'));
    }

    // Resize the image
    public function registerMediaConversions(Media $media = null): void
    {
        if (env('RESIZE_IMAGE') === true) {

            $this->addMediaConversion('resized-image')
                ->width(env('IMAGE_WIDTH', 300))
                ->height(env('IMAGE_HEIGHT', 300));
        }
    }
}
