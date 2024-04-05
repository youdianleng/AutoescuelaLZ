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
        $request->validate([
            'question'  => 'required',
            'difficulty.name' => 'required', // Validar que 'difficulty.name' esté presente en la solicitud
            'carnet.name' => 'required',
            'test' => 'required'
        ]);
    
        // Obtener el nombre de la dificultad del request
        $difficultyName = $request->input('difficulty.name');
        $carnetName = $request->input('carnet.name');
        $test_id = $request->input('test');
        // Crear la pregunta utilizando los datos del request
        $test = Question::create([
            'question' => $request->input('question'),
            'difficulty' => $difficultyName, // Asignar el nombre de la dificultad
            'carnet' => $carnetName,
            'test_id' => $test_id,
        ]);

        //$test->options()->delete();
        $test->options()->createMany($request->respuestas);
        return response()->json(['success' => true, 'data' => $test]);


        // $this->authorize('question-create');


        // if ($request->hasFile('thumbnail')) {
        //     $question->addMediaFromRequest('thumbnail')->preservingOriginal()->toMediaCollection('images-questions');
        // }


    }

    public function difficultyQuestions($Difficulty,$id){
        $Questions = Question::with('options')->where('difficulty', $Difficulty)->where('test_id',$id)->get();
        
        return response()->json($Questions);
    }

    public function especificQuestions($idQuestion){
        $Questions = Question::where('difficulty', $idQuestion)->get();
        
        return response()->json($Questions);
    }

    

}
