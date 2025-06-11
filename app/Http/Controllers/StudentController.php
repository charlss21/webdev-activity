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

    public function createStudent(Request $request){
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'age' => 'required|integer|min:1',
        'gender' => 'required|in:male,female',
        'address' => 'required|string|max:255',
    ]);
     Student::create($request->only([
            'firstname',
            'lastname',
            'middlename',
            'age',
            'gender',
            'address'
        ]));
        return redirect()->route('ViewStudents')->with('success', 'Student created successfully.');
    }

        public function updateStudent(Request $request, $id){
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'age' => 'required|integer|min:1',
        'gender' => 'required|in:male,female',
        'address' => 'required|string|max:255',
    ]);
    $updateStudent = Student::findOrFail($id);
    $updateStudent->firstname = $request->firstname;
    $updateStudent->lastname = $request->lastname;
    $updateStudent->middlename = $request->middlename;
    $updateStudent->age = $request->age;
    $updateStudent->gender = $request->gender;
    $updateStudent->address = $request->address;
    $updateStudent->save();

    return redirect()->route('ViewStudents')->with('success', 'Student updated successfully.');
    }

    public function deleteStudent($id){
        $deleteStudent = Student::findOrFail($id);
        $deleteStudent->delete();
        return redirect()->route('ViewStudents')->with('success', 'Student deleted successfully.');
    }
}



