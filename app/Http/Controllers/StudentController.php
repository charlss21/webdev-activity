<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
public function ViewStudents(){
    $students = Student::all();
    $users = User::all();
    return view('layouts.ViewStudent', compact('students', 'users'));
}
}