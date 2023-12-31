<?php

use App\Http\Controllers\LoginController;
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

//Frontend
Route::get('/', function () {
    return view('Frontend.templete.home');
});


//Backend
Route::get('/login', function () {
    return view('Backend.login');
});

Route::get('/admin', function () {
    return view('Backend.templete.dashboard');
})->middleware('userAuth');

Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);//logout

Route::get('/teacher', function(){
    return"You are in now Teacher Dashboard";
});

Route::get('/student', function(){
    return"You are in now Student Dashboard";
});





