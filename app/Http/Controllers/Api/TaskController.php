<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Tasks::all()->toArray();
        return $tasks;
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|max:5',
            'description' => 'required'
        ]);
        $task = $request->all();
        $tarea = Tasks::create($task);


        return response()->json(['success' => true, 'data' => $tarea]);
    }

    public function update($id, Request $request)
    {
        $task = Tasks::find($id);
        $request->validate([
            'name' => 'required|max:5',
            'description' => 'required'
        ]);


        $dataToUpdate = $request->all();
        $task->update($dataToUpdate);


        return response()->json(['success' => true, 'data' => $task]);
    }

    public function destroy($id, Request $request)
    {
        $task = Tasks::find($id);
        $task->delete();


        return response()->json(['success' => true, 'data' => "Deleted"]);
    }



}
