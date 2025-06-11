<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f3f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .success {
            background-color: #e6ffed;
            border-left: 5px solid #2ecc71;
            padding: 15px;
            color: #2d6a4f;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 40px;
        }

        form h3 {
            margin-top: 0;
            color: #34495e;
        }

        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 20px;
            border-bottom: 1px solid #ecf0f1;
        }

        th {
            background-color: #ecf0f1;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .no-data {
            text-align: center;
            color: #888;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Management</h1>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('students.create') }}">
            @csrf
            <h3>Add New Student</h3>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="text" name="middlename" placeholder="Middle Name">
            <input type="number" name="age" placeholder="Age" required>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="text" name="address" placeholder="Address" required>
            <button type="submit">Add Student</button>
        </form>

        <h3>All Students</h3>
        @if($students->count())
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->firstname }} {{ $student->middlename ? $student->middlename . ' ' : '' }}{{ $student->lastname }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ ucfirst($student->gender) }}</td>
                            <td>{{ $student->address }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data">No students found.</div>
        @endif
    </div>
</body>
</html>
