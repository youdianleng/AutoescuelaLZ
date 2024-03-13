<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;


class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('question-create');

        if ($request->hasFile('thumbnail')) {
            $question->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-questions');
        }

    }

}
