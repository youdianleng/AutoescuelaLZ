<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\License;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\StudentResource;
class StudentController extends Controller
{
    public function index()
    {

        $students = Student::with('teachers')->get();
        // $tasks = User::withRole()->get();
         return $students;
    }

    public function license()
    {

        $license = License::all();
        // $tasks = User::withRole()->get();
         return $license;
    }

    public function teacher()
    {
        $teacher = Teacher::all();
        // $tasks = User::withRole()->get();
         return $teacher;
    }


    public function store(Request $request)
    {
        return $request;
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

        // Comprobar si el email de estudiante esta creado o no
        $comprobarExistencia = Student::where('email', $request["email"])->get();
        
        //Verifica si el email se encuentra o no
        if(!$comprobarExistencia->isEmpty()){
            $student = Student::where('name', $request["name"])->get();
            return $student;
        }{
            $task = $request->all();
            $teacher_id = $task["teacher_id"];
            $tarea = Student::create($task);

            if ($request->hasFile('thumbnail')) {
                $tarea->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
                return "Success";
            }else{
                return $request;
            }

            $tarea->teachers()->attach($teacher_id);

            //Crear user 
            $userStudent = User::create([
                'user_id' => $tarea['id'],
                'name' => $request["name"],
                'surname' => $request["surname"],
                'email' => $request["email"],
                'password' => bcrypt($request["password"]),
                'teacher_id' => $teacher_id
                ]
            );
            //Asignar role para este usuario
            $userStudent->assignRole(["student"]);


            //Crear el imagen
            return new StudentResource($tarea);
        }
        
        
    }

    public function update($id, Request $request)
    {

        $student = Student::find($id);

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
        
        if($request->hasFile('thumbnail')) {
            $student->media()->delete();
            $student->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
        }

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

        $student = Student::find($id);
        $student->delete();

        $student->teachers()->sync([]);



        return response()->json(['success' => true, 'data' => "Deleted"]);
    }


    
}
