<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\api\OptionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\QuestionController;
use App\Models\Question;

// Preguntas
Route::get('question', [QuestionController::class, 'index']);
Route::post('question', [QuestionController::class, 'store']);
Route::get('question/{level}/{id}', [QuestionController::class, 'difficultyQuestions']);


//Optiones
Route::post('option', [OptionController::class, 'store']);


//Example 
Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks/', [TaskController::class, 'store']);
Route::put('tasks/update/{id}', [TaskController::class, 'update']);
Route::delete('tasks/{id}', [TaskController::class, 'destroy']);
Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');





// Funciones para Students
Route::get('student', [StudentController::class, 'index']);
Route::get('license', [StudentController::class, 'license']);
Route::get('teacher', [StudentController::class, 'teacher']);
Route::post('student/create', [StudentController::class, 'store']);


Route::get('student/{id}', [StudentController::class, 'findStudent']);


Route::post('student/update/{id}', [StudentController::class, 'update']);
Route::delete('student/{id}', [StudentController::class, 'destroy']);
Route::get('student/test/{user_id}/{test_id}',[StudentController::class, 'getPartTestCompleteStudent']);
Route::get('student/testQuestion/{user_id}/{idTest}',[StudentController::class, 'getStudentTestQuestion']);
Route::post('student/review/{user_id}', [StudentController::class, 'submitReview']);
Route::get('student/review/find/{user_id}', [StudentController::class, 'findReview']);
Route::get('review', [StudentController::class, 'getReview']);

//Funciones para Test
Route::get('test', [TestController::class, 'index']);
Route::get('test/{id}', [TestController::class, 'answerTestQuestions']);

Route::put('tests/update/{id}', [TestController::class, 'update']);
Route::delete('tests/{id}', [TestController::class, 'destroy']);

Route::get('tests/{tests}', [TestController::class,'show']);
Route::get('facilTest', [TestController::class, 'facil']);
Route::get('normalTest', [TestController::class, 'normal']);
Route::get('dificilTest', [TestController::class, 'dificil']);
Route::post('test/finalizar/{user_id}/{id}/{passed}/{level}', [TestController::class, 'storeTest']);
Route::post('test/sendActualQuestion/{user_id}/{id}/{question}/{is_correct}', [TestController::class, 'storeTestQuestion']);
Route::put('test/sendActualQuestionEdit/{user_id}/{id}/{question}/{is_correct}', [TestController::class, 'EditTestQuestionExist']);
Route::delete('test/exist/{user_id}/{id}', [TestController::class, 'existUserTest']);
Route::delete('test/existTestQuestion/{user_id}/{test_id}', [TestController::class, 'existUserTestQuestion']);




// SelectLevel
Route::get('selectLevel/student/{id}',[TestController::class, 'selectStudentMadeTest']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UserController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('roles', RoleController::class);
    //Route::apiResource('exercises', ExerciseController::class);

    
    Route::post('exercises/', [ExerciseController::class,'store']); //Guardar


    Route::get('exercises', [ExerciseController::class,'index']); //Listar
    Route::get('exercises/{exercise}', [ExerciseController::class,'show']); //Mostrar


    Route::post('exercises/update/{id}', [ExerciseController::class,'update']); //Editar



    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);
    Route::get('category-list', [CategoryController::class, 'getList']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::put('/user', [ProfileController::class, 'update']);

    Route::get('abilities', function(Request $request) {
        return $request->user()->roles()->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique()
            ->values()
            ->toArray();
    });
});


Route::get('category-list', [CategoryController::class, 'getList']);
Route::get('get-posts', [PostController::class, 'getPosts']);
Route::get('get-category-posts/{id}', [PostController::class, 'getCategoryByPosts']);
Route::get('get-post/{id}', [PostController::class, 'getPost']);
