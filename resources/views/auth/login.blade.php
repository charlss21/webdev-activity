@extends('layouts.base')

@section('title', 'login')

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
</style>

<div class="login-page">
    <div class="login-card shadow">
        <h3 class="text-center mb-4"><i class="bi bi-person-lock me-2"></i>login</h3>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent text-white border-end-0">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email"
                           class="form-control text-white bg-transparent border-start-0 @error('email') is-invalid @enderror"
                           name="email"
                           id="email"
                           placeholder="you@example.com"
                           value="{{ old('email') }}"
                           required>
                </div>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent text-white border-end-0">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password"
                           class="form-control text-white bg-transparent border-start-0 @error('password') is-invalid @enderror"
                           name="password"
                           id="password"
                           placeholder="••••••••"
                           required>
                </div>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-light text-primary fw-bold">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </div>

            <div class="mt-3 text-center">
                Don't have an account? <a href="{{ route('register') }}">Register here</a>
            </div>
        </form>
    </div>
</div>
@endsection