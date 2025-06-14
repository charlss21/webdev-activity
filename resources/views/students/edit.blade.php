@extends('layouts.app') 
@section('content')
<div class="container">
    <h2>Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>First Name</label>
            <input type="text" name="firstname" value="{{ old('firstname', $student->firstname) }}" required>
        </div>

        <div>
            <label>Middle Name</label>
            <input type="text" name="middlename" value="{{ old('middlename', $student->middlename) }}">
        </div>

        <div>
            <label>Last Name</label>
            <input type="text" name="lastname" value="{{ old('lastname', $student->lastname) }}" required>
        </div>

        <div>
            <label>Age</label>
            <input type="number" name="age" value="{{ old('age', $student->age) }}" required>
        </div>

        <div>
            <label>Gender</label>
            <select name="gender" required>
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div>
            <label>Address</label>
            <input type="text" name="address" value="{{ old('address', $student->address) }}" required>
        </div>

        <button type="submit">Update Student</button>
    </form>
</div>
@endsection
