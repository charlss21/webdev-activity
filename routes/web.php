<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
return redirect()->route('login');
Route::get('/', function () {
    return redirect()->route('login');  // ✅ safe
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::resource('students', StudentController::class)->except(['index']);
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/login', function () {return view('auth.login');})->name('login');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', function () { Auth::logout();return redirect()->route('login'); })->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('students', StudentController::class);
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::resource('students', StudentController::class);
Route::resource('posts', PostController::class)->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



Route::middleware([AuthCheck::class])->group(function () {
Route::get('/', [StudentController::class, 'ViewStudents'])->name('dashboard');

//Create Student
Route::post('/createStudent', [StudentController::class, 'createStudent'])->name('createStudent');

Route::delete('deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
});