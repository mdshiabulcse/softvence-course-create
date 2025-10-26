@extends('layouts.app')

@section('title', 'Dashboard - Softvence')

@section('content')
    <div style="text-align: center; padding: 4rem 0;">
        <h1 style="font-size: 3rem; margin-bottom: 1rem; background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Welcome back, {{ auth()->user()->name }}!
        </h1>
        <p style="font-size: 1.2rem; color: var(--gray); margin-bottom: 3rem;">
            Ready to create your next amazing course?
        </p>

        <div style="display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap; margin-bottom: 3rem;">
            <div style="background: rgba(30, 41, 59, 0.8); padding: 2rem; border-radius: 16px; text-align: center; min-width: 200px;">
                <i class="fas fa-book" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--light); margin-bottom: 0.5rem;">My Courses</h3>
                <p style="color: var(--gray);">Manage your courses</p>
                <a href="{{ route('courses.index') }}" class="btn btn-outline" style="margin-top: 1rem;">
                    View Courses
                </a>
            </div>

            <div style="background: rgba(30, 41, 59, 0.8); padding: 2rem; border-radius: 16px; text-align: center; min-width: 200px;">
                <i class="fas fa-plus" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
                <h3 style="color: var(--light); margin-bottom: 0.5rem;">Create Course</h3>
                <p style="color: var(--gray);">Start a new course</p>
                <a href="{{ route('courses.create') }}" class="btn btn-primary" style="margin-top: 1rem;">
                    Create Now
                </a>
            </div>
        </div>

        <div style="background: rgba(30, 41, 59, 0.5); padding: 2rem; border-radius: 16px; max-width: 600px; margin: 0 auto;">
            <h3 style="color: var(--light); margin-bottom: 1rem;">Quick Actions</h3>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('courses.public') }}" class="btn btn-outline">
                    <i class="fas fa-globe"></i> Browse All Courses
                </a>
                <a href="{{ route('courses.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> New Course
                </a>
            </div>
        </div>
    </div>
@endsection
