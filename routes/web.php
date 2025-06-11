<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'ViewStudents'])->name('ViewStudents');

//Create Student
Route::post('/createStudent', [StudentController::class, 'createStudent'])->name('createStudent');