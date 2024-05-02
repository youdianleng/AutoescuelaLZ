<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question; 
use App\Models\students_tests;
use App\Models\student_test_question;

class TestController extends Controller
{   
    // return all the test we have in database
    public function index() {
        $tests = Test::all();
        return response()->json($tests);
    }

    // Get all the question
    public function question() {
        $question = Question::all();
        return $question;
    }

    // Store the new test  into the database
    public function store(Request $request) {
        $request->validate([
            'errors'  => 'required'
        ]);
        
        $test = Test::create($request->all());

        return response()->json(['success' => true, 'data' => $test]);
    }

    // Get all the test with level facil
    public function facil() {
        $tests = Test::where('level', "Baja")->get();
        return response()->json($tests);
    }

    // Get all the test with level Normal
    public function normal() {
        $tests = Test::where('level', "Normal")->get();
        return response()->json($tests);
    }

    // Get all the test with level Dificil
    public function dificil() {
        $tests = Test::where('level', "Dificil")->get();
        return response()->json($tests);
    }

    // Store the test that user maked and save into the database
    public function storeTest($user_id, $id, $passed, $level){

        // Create as a new register
        $saveTest = students_tests::create(
            [
                'student_id' => $user_id,
                'test_id' => $id,
                'is_correct' => $passed,
                'level' => $level
            ]
        );


        // Return the data
        return response()->json(['success' => true, 'data' => $saveTest]);
    }

    // Store the question that the student is making to trace the percentage of test he did in this test
    public function storeTestQuestion($user_id, $id, $question, $is_correct){

        // Set the value to insert the data
        $saveTest = student_test_question::create(
            [
                'student_id' => $user_id,
                'test_id' => $id,
                'question_id' => $question,
                'is_correct' => $is_correct,
            ]
        );


        // return this data
        return response()->json(['success' => true, 'data' => $saveTest]);
    }


    // Check if student have change his idea while hes choosing an option of the question, replace the data to the new one
    public function EditTestQuestionExist($user_id, $id, $question, $is_correct){

        // find the test with student_id and test_id
        $replaceData = student_test_question::where("student_id",$user_id)->where("test_id",$id)->where("question_id",$question)->first();
        
        // Change the question result with with the new one
        $replaceData->update(
            [
                'student_id' => $user_id,
                'test_id' => $id,
                'question_id' => $question,
                'is_correct' => $is_correct,
            ]
        );

        // Return the data
        return response()->json(['success' => true, 'data' => $replaceData]);
    }


    // Check is this student have already done a test
    public function existUserTest($user_id, $id){
        // if student have already did the test with this id 
        $existUser = students_tests::where('student_id', $user_id)->where('test_id',$id)->first();

        // delete it from the database to regist the new one
        if($existUser){
            $existUser->delete();
        }

        // Return data
        return response()->json(['success' => true, 'data' => "Deleted"]);

    }


    // Delete all questions from this user in this test
    public function existUserTestQuestion($user_id, $test_id){

        // Find all the question where have the user_id and test_id
        $existUserQuestion = student_test_question::where("student_id",$user_id)->where('test_id',$test_id);

        // delete it all
        if($existUserQuestion){
            $existUserQuestion->delete();
        }

        // return data
        return response()->json(['success' => true, 'data' => "Deleted"]);

    }

    // Get the answer of the question of this test
    public function answerTestQuestions($id_test) {
        $tests = Question::where('test_id', $id_test)->with('options')->get();
        
        return response()->json(['success' => true, 'data' => $tests]);
    }

    // this is gonna return those test that the student complete correctly and passed
    public function selectStudentMadeTest($student_id){

        // find all the test have done by this student
        $tests = students_tests::where('student_id', $student_id)->where('is_correct',1)->get();
        
        // Return the data
        return response()->json(['success' => true, 'data' => $tests]);
    }


}
