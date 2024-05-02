<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    // Get all the question 
    public function index(){
        $Questions = Question::all();

        // Return these Question
        return response()->json($Questions);
    }
    
    // Save question into the test
    public function store(Request $request)
    {   
        // Decode the data of request
        $carnetData = json_decode($request['carnet']);
        $difficultyData = json_decode($request['difficulty']);
        $testData = json_decode($request['test_id']);

        // Check the validation that if these data have complete the role
        $request->validate([
            'question'  => 'required',
            'difficulty' => 'required', 
            'carnet' => 'required',
            'test_id' => 'required'
        ]);

       
        // Create the question with the data
        $test = Question::create([
            'question' => $request['question'],
            'difficulty' => $difficultyData->name, 
            'carnet' => $carnetData->name,
            'test_id' => $testData->id,
            'thumbnail',
        ]);

        // this part is use for get the array of option, because in a question have many options
        $decodedRespuestas = [];   
        // do a foreach to get separate options
        foreach ($request['respuestas'] as $respuesta) {
            $decodedRespuesta = json_decode($respuesta, true); // El segundo argumento true convierte el objeto stdClass en un array asociativo
            if ($decodedRespuesta !== null) { // Verificar si la decodificación fue exitosa
                $decodedRespuestas[] = $decodedRespuesta;
            }
        }

        // Call the function to create many option and asign the question_id with them
        $test->options()->createMany($decodedRespuestas);

        // Insert the Image of the question
        if ($request->hasFile('thumbnail')) {
            $test->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
        }else{
        }

        // Return the data
        return response()->json(['success' => true, 'data' => $test]);

    }

    // Get the difficulty of the test
    public function difficultyQuestions($Difficulty,$id){
        // Get the difficulty of the test
        $Questions = Question::with('options')->where('difficulty', $Difficulty)->where('test_id',$id)->with('media')->get();
        
        return response()->json($Questions);
    }

    // Get the specific level test
    public function especificQuestions($idQuestion){
        // Get the difficulty of the question
        $Questions = Question::where('difficulty', $idQuestion)->get();
        
        return response()->json($Questions);
    }

    

}
