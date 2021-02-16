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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('etudiant',\App\Http\Controllers\EtudiantController::class);
Route::resource('mail',\App\Http\Controllers\MailController::class);
Route::resource('sms',\App\Http\Controllers\SMSController::class);
