<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller




{
    public function __construct()
{
    $this->middleware('auth');
}
    
public function index()
{
    $students = Student::all(); // or paginate, or where condition
    return view('students.index', compact('students')); // Adjust the view path if needed
}
    // Show all students
    public function viewStudents()
    {
        $students = Student::all();
        $users = User::all();
        return view('layouts.ViewStudent', compact('students', 'users'));
    }

    // Show the form for editing a specific student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Store a new student
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
        ]);

        Student::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    // Update an existing student
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return redirect()->route('dashboard')->with('success', 'Student updated successfully.');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('dashboard')->with('success', 'Student deleted successfully.');
    }
}
