@extends('layouts.base')
@section('content')

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStudentModal">
            + Create Student
        </button>
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>

    <!-- Success Message -->

            </form>
        </div>
    </div>

@endsection