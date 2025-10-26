@extends('layouts.app')

@section('title', 'Softvence - Online Courses')

@section('content')
    <div class="container">
        <div style="text-align: center; padding: 3rem 0;">
            <h1 style="font-size: 2.5rem; color: #1f2937; margin-bottom: 1rem;">Learn Something New</h1>
            <p style="font-size: 1.125rem; color: #6b7280; margin-bottom: 2rem;">
                Discover thousands of courses from expert instructors
            </p>

            @auth
                <a href="{{ route('courses.create') }}" class="btn btn-primary"
                   style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                    <i class="fas fa-plus"></i> Create Course
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary"
                   style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                    <i class="fas fa-user-plus"></i> Start Learning Free
                </a>
            @endauth
        </div>

        <div style="text-align: center; margin: 3rem 0;">
            <h2 style="color: #1f2937; margin-bottom: 2rem;">Featured Courses</h2>
            <a href="{{ route('courses.public') }}" class="btn btn-outline">
                View All Courses <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
@endsection
