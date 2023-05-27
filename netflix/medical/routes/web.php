<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\ActorsMoviesController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});

Route::get('appointment', function () {
    return view('appointment');
});

Route::get('dbconn', function () {
    return view('db-connection');
});



Route::resource('user', UserController::class); 
Route::resource('movie', MovieController::class); 
Route::resource('director', DirectorController::class); 

Route::resource('actor', ActorController::class); 
Route::resource('/actormovie', ActorsMoviesController::class); 



