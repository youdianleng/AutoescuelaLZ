<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class QuestionController extends Controller
{

    public function options() {
        $option = Option::all();
        return $option;
    }
    public function store(Request $request)
    {
        $this->authorize('question-create');


        // if ($request->hasFile('thumbnail')) {
        //     $question->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-questions');
        // }

    }

}
