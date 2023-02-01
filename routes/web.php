<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Form2Controller;
use App\Http\Controllers\JsonController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/news', function () {
        return view('news');
    })->name('news');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::post('/submit', [FormController::class, 'submit'])->name('submit');
Route::post('/submit2', [Form2Controller::class, 'submit'])->name('submit2');
Route::get('/hazard.json', function(){
    return response()->file(storage_path('app/public/hazard.json'));
});
Route::get('/news.json', function(){
    return response()->file(storage_path('app/public/news.json'));
});


