<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    public function index() {
    }

    public function store(Request $request){
        $request->validate([
            'Option'  => 'required',
            'option_text' => 'required',
            'is_correct',
            'result',
        ]);

        $test = Option::create($request->all());

        $test->tests();

        return response()->json(['success' => true, 'data' => $test]);
    }

}
