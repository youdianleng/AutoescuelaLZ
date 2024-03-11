<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::with('teachers')->get();
        // $tasks = User::withRole()->get();
         return $students;
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
        $tarea = Student::create($task);

        $tarea->teachers()->attach($teacher_id);
        
        return response()->json(['success' => true, 'data' => $tarea]);
    }

    public function update($id, Request $request)
    {
<<<<<<< HEAD
        $student = Student::find($id);
=======
        $task = Student::find();
>>>>>>> 5de6efd73ed4c702d2927595ae67802a578f9bef
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
        
        $student->update($dataToUpdate);
        $teacher_id = $dataToUpdate["teacher_id"];
        $student->teachers()->sync($teacher_id);

        return response()->json(['success' => true, 'data' => $student]);
    }

    //Find the student with the specific ID
    public function findStudent($id, Request $request)
    {
        
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Estudiante no encontrado'], 404);
        }

        return response()->json(['success' => true, 'data' => $student]);
    }

    //Destroy the specific student with the same id we sended
    public function destroy($id, Request $request)
    {
<<<<<<< HEAD
        $student = Student::find($id);
        $student->delete();

        $student->teachers()->sync([]);
=======
        $task = Student::find($id);
        $task->delete();
>>>>>>> 5de6efd73ed4c702d2927595ae67802a578f9bef


        return response()->json(['success' => true, 'data' => "Deleted"]);
    }


    
}
