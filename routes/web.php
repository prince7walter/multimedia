<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {return view('page/login');})->name('login');
Route::post('login/post', [\App\Http\Controllers\UserController::class,'login'])->name('loginpost');

Route::resource('dashbord',\App\Http\Controllers\DashbordController::class);
Route::resource('etudiant',\App\Http\Controllers\EtudiantController::class);
Route::resource('mail',\App\Http\Controllers\MailController::class);
Route::resource('sms',\App\Http\Controllers\SMSController::class);
Route::post('message/{id}', [\App\Http\Controllers\MailController::class,'_store'])->name('message');
