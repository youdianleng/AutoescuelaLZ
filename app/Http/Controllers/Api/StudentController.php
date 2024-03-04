<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $tasks = Student::with("teachers")->get();
        return $tasks;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:5',
            'surname' => 'required',
            ''

        ]);

        $task = $request->all();
        $tarea = Student::create($task);

        $tarea->teachers()->sync([1]);

        return response()->json(['success' => true, 'data' => $tarea]);
    }
}
