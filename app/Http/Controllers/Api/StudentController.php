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
            'name' => 'required|max:10',
            'surname' => 'required',
            'password' => 'required',
            'teacher_id' => 'required',
            'email' => 'required|email',
            'address',
            'image',
            'license_id' => 'required',
        ]);

        $task = $request->all();

        $tarea = Student::create($task);

        return response()->json(['success' => true, 'data' => $tarea]);
    }

    public function update(Request $request)
    {
        $mailStudent = $request->input('email');
        $task = Student::find($mailStudent);
        $request->validate([
            'name' => 'required|max:10',
            'surname' => 'required',
            'password' => 'required',
            'teacher_id' => 'required',
            'email' => 'required|email',
            'address',
            'image',
            'license_id' => 'required',
        ]);


        $dataToUpdate = $request->all();
        $task->update($dataToUpdate);


        return response()->json(['success' => true, 'data' => $task]);
    }

    
}
