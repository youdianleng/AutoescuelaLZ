<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $tasks = User::with("teacher")->get();
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
        $teacher_id = $task["teacher_id"];
        $tarea = User::create($task);

        $tarea->teacher()->attach($teacher_id);
        return response()->json(['success' => true, 'data' => $tarea]);
    }

    public function update(Request $request)
    {
        $task = User::find();
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

    //Find the student with the specific ID
    public function findStudent($id, Request $request)
    {
        
        $student = User::find($id);
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Estudiante no encontrado'], 404);
        }

        return response()->json(['success' => true, 'data' => $student]);
    }

    //Destroy the specific student with the same id we sended
    public function destroy($id, Request $request)
    {
        $task = User::find($id);
        $task->delete();


        return response()->json(['success' => true, 'data' => "Deleted"]);
    }


    
}
