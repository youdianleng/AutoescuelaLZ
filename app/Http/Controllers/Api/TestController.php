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
    public function index() {
        $tests = Test::all();
        return response()->json($tests);
    }

    public function question() {
        $question = Question::all();
        return $question;
    }

    public function show(Test $test) {

    }

    public function store(Request $request) {
        $request->validate([
            'errors'  => 'required'
        ]);
        
        $test = Test::create($request->all());

        return response()->json(['success' => true, 'data' => $test]);
    }

    public function update(Request $request, Test $test) {
    }

    public function destroy(Test $test) {
    }


    public function facil() {
        $tests = Test::where('level', "Baja")->get();
        return response()->json($tests);
    }
    public function normal() {
        $tests = Test::where('level', "normal")->get();
        return response()->json($tests);
    }
    public function dificil() {
        $tests = Test::where('level', "dificil")->get();
        return response()->json($tests);
    }

    public function storeTest($user_id, $id, $passed){


        $saveTest = students_tests::create(
            [
                'student_id' => $user_id,
                'test_id' => $id,
                'is_correct' => $passed
            ]
        );



        return response()->json(['success' => true, 'data' => $saveTest]);
    }

    public function storeTestQuestion($user_id, $id, $question, $is_correct){


        $saveTest = student_test_question::create(
            [
                'student_id' => $user_id,
                'test_id' => $id,
                'question_id' => $question,
                'is_correct' => $is_correct
            ]
        );



        return response()->json(['success' => true, 'data' => $saveTest]);
    }


    public function existUserTest($user_id, $id){

        $existUser = students_tests::where('student_id', $user_id)->where('test_id',$id)->first();
        if($existUser){
            $existUser->delete();
        }

        return response()->json(['success' => true, 'data' => "Deleted"]);

    }

    public function existUserTestQuestion($user_id, $test_id){

        $existUserQuestion = student_test_question::where("student_id",$user_id)->where('test_id',$test_id);
        if($existUserQuestion){
            $existUserQuestion->delete();
        }

        return response()->json(['success' => true, 'data' => "Deleted"]);

    }


    public function answerTestQuestions($id_test) {
        $tests = Question::where('test_id', $id_test)->with('options')->get();
        
        return response()->json(['success' => true, 'data' => $tests]);
    }

    public function selectStudentMadeTest($student_id){
        $tests = students_tests::where('student_id', $student_id)->with('test_level')->get();
        
        return response()->json(['success' => true, 'data' => $tests]);
    }


}
