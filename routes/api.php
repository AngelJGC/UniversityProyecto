<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){

    Route::prefix('auth')->group(function(){

        Route::post('login', [App\Http\Controllers\Api\AuthController::class,'login']);
        Route::post('signup', [App\Http\Controllers\Api\AuthController::class,'signup']); 

    });
});

Route::get('/teachers', [App\Http\Controllers\TeacherController::class,'index']);
Route::get('/students', [App\Http\Controllers\StudentController::class,'index']);
Route::get('/admins', [App\Http\Controllers\AdminController::class,'index']);
Route::get('/courses', [App\Http\Controllers\CourseController::class,'index']);

Route::post('/teachers', [App\Http\Controllers\TeacherController::class,'store']);
Route::post('/students', [App\Http\Controllers\StudentController::class,'store']);
Route::post('/courses', [App\Http\Controllers\CourseController::class,'store']);
Route::post('/scores', [App\Http\Controllers\ScoreController::class,'store']);

Route::put('/teachers/{user}', [App\Http\Controllers\TeacherController::class, 'update']);
Route::put('/students/{user}', [App\Http\Controllers\StudentController::class, 'update']);
Route::put('/courses/{course}', [App\Http\Controllers\CourseController::class,'update']);

Route::middleware(['auth', 'teacher'])->group(function () {
Route::get('/scores', [App\Http\Controllers\ScoreController::class,'index']);
Route::put('/scores/{score}', [App\Http\Controllers\ScoreController::class,'update']);
Route::delete('/courses/{course}', [App\Http\Controllers\CourseController::class,'destroy']);
});
