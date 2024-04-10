<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

    public function index(){
        $Questions = Question::all();
        return response()->json($Questions);
    }

    // public function options() {
    //     $option = Option::all();
    //     return $option;
    // }

    public function store(Request $request)
    {   

        $carnetData = json_decode($request['carnet']);
        $difficultyData = json_decode($request['difficulty']);
        $testData = json_decode($request['test_id']);
        $request->validate([
            'question'  => 'required',
            'difficulty' => 'required', // Validar que 'difficulty.name' esté presente en la solicitud
            'carnet' => 'required',
            'test_id' => 'required'
        ]);

       
        // Crear la pregunta utilizando los datos del request
        $test = Question::create([
            'question' => $request['question'],
            'difficulty' => $difficultyData->name, // Asignar el nombre de la dificultad
            'carnet' => $carnetData->name,
            'test_id' => $testData->id,
            'thumbnail',
        ]);

        $decodedRespuestas = [];
        foreach ($request['respuestas'] as $respuesta) {
            $decodedRespuesta = json_decode($respuesta, true); // El segundo argumento true convierte el objeto stdClass en un array asociativo
            if ($decodedRespuesta !== null) { // Verificar si la decodificación fue exitosa
                $decodedRespuestas[] = $decodedRespuesta;
            }
        }

        //$test->options()->delete();
        $test->options()->createMany($decodedRespuestas);

        if ($request->hasFile('thumbnail')) {
            $test->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-exercises');
        }else{
        }

        return response()->json(['success' => true, 'data' => $test]);


        // $this->authorize('question-create');


        // if ($request->hasFile('thumbnail')) {
        //     $question->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-questions');
        // }


    }

    public function difficultyQuestions($Difficulty,$id){
        $Questions = Question::with('options')->where('difficulty', $Difficulty)->where('test_id',$id)->with('media')->get();
        
        return response()->json($Questions);
    }

    public function especificQuestions($idQuestion){
        $Questions = Question::where('difficulty', $idQuestion)->get();
        
        return response()->json($Questions);
    }

    

}
