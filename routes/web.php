<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware([AuthCheck::class])->group(function () {
Route::get('/', [StudentController::class, 'ViewStudents'])->name('dashboard');

//Create Student
Route::post('/createStudent', [StudentController::class, 'createStudent'])->name('createStudent');

Route::delete('deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
});