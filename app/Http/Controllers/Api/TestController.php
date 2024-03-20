<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question; 


class TestController extends Controller
{
    public function index() {
        $tests = Test::all();
        return response()->json($tests);
    }

    public function question() {
        $question = Question::all();
        return $question;
    }

    public function show(Test $test) {

    }

    public function store(Request $request) {
        $request->validate([
            'errors'  => 'required'
        ]);
        
        $test = Test::create($request->all());

        return response()->json(['success' => true, 'data' => $test]);
    }

    public function update(Request $request, Test $test) {
    }

    public function destroy(Test $test) {
    }
}
