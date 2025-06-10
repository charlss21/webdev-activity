@extends('layouts.base')

@section('content')
    <h1 class="mb-4">Welcome to the Student Management System</h1>
Add commentMore actions
    <div class="mb-3">
        <h2 class="h4">Student List</h2>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->firstname }}</td>
                    <td>{{ $student->middlename }}</td>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ ucfirst($student->gender) }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection