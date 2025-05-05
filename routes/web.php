<?php

use App\Http\Controllers\authcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::resource('tasks', TaskController::class)->except(['index']);
Route::post('tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])->name('tasks.toggle-complete');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login',[authcontroller::class,'login'])->name('login');

Route::get('/register',function(){
    return view('auth.register');
});

Route::post("/register",[authcontroller::class,'register'])->name('register');
