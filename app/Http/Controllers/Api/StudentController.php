<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\License;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\StudentResource;
use App\Models\student_review;
use App\Models\student_test_question;
use GuzzleHttp\Promise\Create;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('teachers')->with("media")->get();
        return StudentResource::collection($students);
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

        $request->validate([
            'name' => 'required|max:10',
            'surname' => 'required',
            'password' => 'required',
            'teacher_id' => 'required',
            'email' => 'required|email',
            'address',
            'license_id' => 'required',
            'thumbnail',
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
            }else{
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
        
        $student = Student::where('id',$id)->with("student_test")->with('teachers')->with('media')->get();
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

    // Get these test the student make half or part of them
    public function getPartTestCompleteStudent($user_id, $test_id){
        $incompleteTest = student_test_question::where('student_id',$user_id)->where('test_id',$test_id)->with('question_option')->with('question_question')->get();

        return response()->json(['success' => true, 'data' => $incompleteTest]);
    }

    public function submitReview($user_id, Request $request ){

        $request->validate([
            'comentario' => 'required',
        ]);

        $submitReview = student_review::Create([
            'student_id' => $user_id,
            'review' => $request["comentario"],
            
            ]
        );

        return response()->json(['success' => true, 'data' => $submitReview]);
    }

    public function findReview($user_id){

        $findReview = student_review::where('student_id',$user_id)->get();

        return response()->json(['success' => true, 'data' => $findReview]);
    }

    // Get all the reviews
    public function getReview(){
        $findReview = Student::with('review_student')->with('media')->get();

        return $findReview;
    }

    
}
