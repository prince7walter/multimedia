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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1'],function(){
    Route::post('/login',[\App\Http\Controllers\UserController::class,'log']);
    Route::get('/logout',[\App\Http\Controllers\UserController::class,'log'])->middleware('auth:api');
});


Route::get('students', [\App\Http\Controllers\ApiController::class,'getAllStudents']);
Route::get('students/{id}',[\App\Http\Controllers\ApiController::class,'getStudents']);
Route::post('students',[\App\Http\Controllers\ApiController::class,'createStudent']);
Route::put('students/{id}',[\App\Http\Controllers\ApiController::class,'updateStudent']);
Route::delete('students/{id}',[\App\Http\Controllers\ApiController::class,'deleteStudent']);
Route::post('sms',[\App\Http\Controllers\ApiController::class,'sendSms']);
Route::post('email',[\App\Http\Controllers\ApiController::class,'sendEmail']);
Route::get('sms/{id}',[\App\Http\Controllers\ApiController::class,'getSms']);
Route::get('email/{id}',[\App\Http\Controllers\ApiController::class,'getMail']);
Route::get('email',[\App\Http\Controllers\ApiController::class,'getAllEmail']);
Route::get('sms',[\App\Http\Controllers\ApiController::class,'getAllSms']);

