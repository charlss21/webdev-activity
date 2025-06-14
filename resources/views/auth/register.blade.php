@extends('layouts.base')

@section('title', 'Register')

@section('content')

<style>
    .login-page {
        min-height: 100vh;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        color: #fff;
        width: 100%;
        max-width: 400px;
        padding: 2rem;
    }

    .form-control,
    .btn {
        border-radius: 8px;
    }

    .form-control::placeholder {
        color: #d1d1d1;
    }

    label {
        color: #ffffffb3;
    }

    .form-text {
        color: #dcdcdc;
    }

    .alert {
        color: #000;
    }
</style>

<div class="login-page">
    <div class="login-card">
        <h2 class="mb-4 text-center">Create an Account</h2>

        {{-- Success & Error Messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       aria-describedby="nameHelp">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div id="nameHelp" class="form-text">Choose a unique username.</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       aria-describedby="emailHelp">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       id="password" 
                       name="password" 
                       required 
                       aria-describedby="passwordHelp">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div id="passwordHelp" class="form-text">Your password must be at least 8 characters long.</div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" 
                       class="form-control" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            <div class="mt-3 text-center">
                Already have an account? <a href="{{ route('login') }}" style="color: #fff; text-decoration: underline;">Login here</a>
            </div>
        </form>
    </div>
</div>

@endsection