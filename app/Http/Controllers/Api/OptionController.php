<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    public function index() {
        $options = Option::all();
        return response()->json($options);
    }

    public function show(Option $option) {
    }

    public function store(Request $request){

        $request->validate([
            'option_text' => 'required',
            'is_correct'
        ]);
        $datos = $request->all();
        return $datos;

        $test = Option::create($request->all());

        $test->tests();

        return response()->json(['success' => true, 'data' => $test]);
    }

}
