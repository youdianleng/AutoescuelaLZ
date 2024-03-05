<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index() {
        $tests = Test::with("tests")->get();
        return $tests;
    }

    public function store(Request $request) {
        $request->validate([
            'question_id' => 'required',
            'difficulty' => 'required',
        ]);

        $test = Test::create($request->all());

        $test->test()->sync([1]);

        return response()->json(['success' => true, 'data' => $test]);
    }
   
}
