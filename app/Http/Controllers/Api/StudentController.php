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
        // Set the autorization 
        $this->authorize("student-create");
        
        // Require these camp not null
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
        // Check the email of student is already created or not
        $comprobarExistencia = Student::where('email', $request["email"])->get();
        
        // If its created
        if(!$comprobarExistencia->isEmpty()){
            $student = Student::where('name', $request["name"])->get();
            return $student;
        }{
            // If its not created 
            // save the $request data to $task
            $task = $request->all();
            // Get the teacher id from the $task
            $teacher_id = $task["teacher_id"];

            //Create the student with the $task data
            $tarea = Student::create($task);
            
            // if in $request contain thumbnail
            if ($request->hasFile('thumbnail')) {
                // call the function to send the image to the mediaCollection
                $tarea->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
            }else{
            }

            // calling the function created in student model that is goona attach this studen_id with teacher_id
            $tarea->teachers()->attach($teacher_id);

            //Create the student as User
            $userStudent = User::create([
                'user_id' => $tarea['id'],
                'name' => $request["name"],
                'surname' => $request["surname"],
                'email' => $request["email"],
                'password' => bcrypt($request["password"]),
                'teacher_id' => $teacher_id
                ]
            );

            //Assign the role to student
            $userStudent->assignRole(["student"]);


            // return the data 
            return new StudentResource($tarea);
        }
        
        
    }

    // This function is used to update the student data
    public function update($id, Request $request)
    {

        $this->authorize("student-edit");
        // we get the id of the student
        $student = Student::find($id);
        
        // Check the content with the style we want
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

        // save que data to a variable
        $dataToUpdate = $request->all();

        // Call the update function to update this student
        $student->update($dataToUpdate);

        // Get teacher ID from the $dataToUpdate
        $teacher_id = $dataToUpdate["teacher_id"];

        //This function sync() is goona delete the student from the teacher_student table and create this one as new
        $student->teachers()->sync($teacher_id);


        $User = User::where('user_id',$id)->first();
        $User->update([
            "name" => $request['name'],
            "surname" => $request['surname'],
            "password" => bcrypt($request["password"]),
            "teacher_id" => $request['teacher_id'],
            "license_id" => $request['license_id'],
            "email" => $request['email'],
            'address' => $request['address']
        ]);
        
        // Check the thumnial we use it to change the image of student
        if($request->hasFile('thumbnail')) {
            $student->media()->delete();
            $student->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
        }

        // return the data
        return response()->json(['success' => true, 'data' => $student]);
    }

    

    //Find the student with the specific ID
    public function findStudent($id, Request $request)
    {
    
        // We send the id of the student to find the student
        $student = Student::where('id',$id)->with("student_test")->with('teachers')->with('media')->get();
        if (!$student) {
            // if the student dosent exist in out database
            return response()->json(['success' => false, 'message' => 'Estudiante no encontrado'], 404);
        }

        // return the data
        return response()->json(['success' => true, 'data' => $student]);
    }



    //Destroy the specific student with the same id we sended
    public function destroy($id, Request $request)
    {   
        $this->authorize("student-delete");
        // find the student with the id
        $student = Student::find($id);

        // Delete him
        $student->delete();

        // Delete the student from the teacher_student table too
        $student->teachers()->detach();


        // Return the data
        return response()->json(['success' => true, 'data' => "Deleted"]);
    }


    // Get those test the student make half or part of them
    public function getPartTestCompleteStudent($user_id, $test_id){

        // send the student_id and the test hes doing 
        $incompleteTest = student_test_question::where('student_id',$user_id)->where('test_id',$test_id)->with('question_option')->with('question_question')->with('option_question')->get();

        // return the data
        return response()->json(['success' => true, 'data' => $incompleteTest]);
    }

    // Send the Review of the student to show in our home page
    public function submitReview($user_id, Request $request ){

        // Check is there comentario label exist
        $request->validate([
            'comentario' => 'required',
        ]);

        // Create the review with saving the student_id and the review
        $submitReview = student_review::Create([
            'student_id' => $user_id,
            'review' => $request["comentario"],
            
            ]
        );
        
        // return data
        return response()->json(['success' => true, 'data' => $submitReview]);
    }

    // Find the review of the student
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
