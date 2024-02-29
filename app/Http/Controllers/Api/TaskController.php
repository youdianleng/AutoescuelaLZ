<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class TaskController extends Controller
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
            'surname' => 'required'
        ]);

        $task = $request->all();
        $tarea = Student::create($task);

        return response()->json(['success' => true, 'data' => $tarea]);
    }

    // public function update($id, Request $request)
    // {
    //     $task = Tasks::find($id);
    //     $request->validate([
    //         'name' => 'required|max:5',
    //         'description' => 'required'
    //     ]);


    //     $dataToUpdate = $request->all();
    //     $task->update($dataToUpdate);


    //     return response()->json(['success' => true, 'data' => $task]);
    // }

    // public function destroy($id, Request $request)
    // {
    //     $task = Tasks::find($id);
    //     $task->delete();


    //     return response()->json(['success' => true, 'data' => "Deleted"]);
    // }



}
