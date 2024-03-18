<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question; 
use App\Models\Option;


class TestController extends Controller
{
    public function index() {
        $tests = Test::all();
        return response()->json($tests);
    }
    public function show(Test $test) {

    }

    public function store(Request $request) {
        
        $request->validate([
            'question_text'  => 'required',
            'option_text' => 'required',
            'is_correct',
            'result',
        ]);

        $test = Test::create($request->all());

        $test->tests();

        return response()->json(['success' => true, 'data' => $test]);
    }

    public function update(Request $request, Test $test) {
    }

    public function destroy(Test $test) {
    }
}
