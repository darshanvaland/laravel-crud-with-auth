<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Student 

Route::get('/student/index',[StudentsController::class,'index'])->name('student.index');
Route::POST('/student/store',[StudentsController::class,'store'])->name('student.store');
Route::get('/student/edit/{id}',[StudentsController::class,'edit'])->name("student.edit");
Route::POST('/student/update/{id}',[StudentsController::class,'update'])->name('student.update');
Route::Delete('/student/destroy/{id}',[StudentsController::class,'destroy'])->name('student.destroy');