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

<<<<<<< HEAD
        // if ($request->hasFile('thumbnail')) {
        //     $question->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-questions');
        // }

=======
>>>>>>> 608a9b5344827a76f14587c12cf7771789a41550
    }

}
