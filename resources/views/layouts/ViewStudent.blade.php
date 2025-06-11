<div class="container py-5">
    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📚 Student List</h2>
        <button type="button" class="btn btn-outline-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#createStudentModal">
            <i class="bi bi-plus-circle me-1"></i> Create Student
        </button>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>Success:</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Student Table --}}
    <div class="card shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through $students --}}
                        {{-- @foreach ($students as $student) --}}
                        {{-- <tr class="text-center"> --}}
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        {{-- <td>{{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</td> --}}
                        {{-- <td>{{ $student->age }}</td> --}}
                        {{-- <td>{{ ucfirst($student->gender) }}</td> --}}
                        {{-- <td>{{ $student->address }}</td> --}}
                        {{-- <td> --}}
                        {{-- <button class="btn btn-sm btn-outline-warning me-1"><i class="bi bi-pencil"></i></button> --}}
                        {{-- <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button> --}}
                        {{-- </td> --}}
                        {{-- </tr> --}}
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create Student Modal --}}
    <div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('createStudent') }}" method="POST" class="modal-content shadow-lg rounded-4">
                @csrf
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="createStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    {{-- Validation Errors --}}
                    @if($errors->any())
                        <div class="alert alert-danger shadow-sm">
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-4">
                        <div class="col-md-4">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Juan" value="{{ old('firstname') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Santos" value="{{ old('middlename') }}">
                        </div>

                        <div class="col-md-4">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Dela Cruz" value="{{ old('lastname') }}" required>
                        </div>

                        <div class="col-md-2">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" name="age" id="age" class="form-control" min="1" max="100" placeholder="18" value="{{ old('age') }}" required>
                        </div>

                        <div class="col-md-5">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Choose gender...</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="123 Main St." value="{{ old('address') }}" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4 py-3">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Submit
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
