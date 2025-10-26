@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div
            style="max-width: 400px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h1 style="color: #1f2937; margin-bottom: 0.5rem;">Create Account</h1>
                <p style="color: #6b7280;">Join us today</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 4px;"
                           placeholder="Enter your full name">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 4px;"
                           placeholder="Enter your email">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Password</label>
                    <input type="password" name="password" required
                           style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 4px;"
                           placeholder="Create a password">
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                           style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 4px;"
                           placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>

                <div style="text-align: center; margin-top: 1.5rem;">
                    <p style="color: #6b7280;">
                        Already have an account?
                        <a href="{{ route('login') }}" style="color: #3b82f6; text-decoration: none;">Sign in</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
