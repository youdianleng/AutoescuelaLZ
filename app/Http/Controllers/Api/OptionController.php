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
    }

}
