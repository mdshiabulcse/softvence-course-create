@extends('layouts.app')

@section('title', 'All Courses')

@section('content')
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem; color: #1f2937;">All Courses</h1>

        @if($courses->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                @foreach($courses as $course)
                    <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        @if($course->feature_image)
                            <img src="{{ Storage::url($course->feature_image) }}" alt="Course Image"
                                 style="width: 100%; height: 160px; object-fit: cover; border-radius: 6px; margin-bottom: 1rem;">
                        @else
                            <div style="width: 100%; height: 160px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                <i class="fas fa-book" style="font-size: 3rem; color: #9ca3af;"></i>
                            </div>
                        @endif

                        <h3 style="color: #1f2937; margin-bottom: 0.5rem;">{{ $course->title }}</h3>
                        <div style="background: #3b82f6; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; display: inline-block; margin-bottom: 1rem;">
                            {{ $course->category }}
                        </div>

                        @if($course->description)
                            <p style="color: #6b7280; margin-bottom: 1rem; font-size: 0.875rem;">
                                {{ Str::limit($course->description, 100) }}
                            </p>
                        @endif

                        <div style="display: flex; justify-content: between; color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">
                            <span><i class="fas fa-layer-group"></i> {{ $course->modules->count() }} modules</span>
                            <span><i class="fas fa-play-circle"></i> {{ $course->modules->flatMap->contents->count() }} videos</span>
                        </div>

                        <a href="{{ route('courses.show', $course) }}" class="btn btn-primary" style="width: 100%; text-align: center;">
                            View Course
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 3rem; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <i class="fas fa-book" style="font-size: 3rem; color: #d1d5db; margin-bottom: 1rem;"></i>
                <h3 style="color: #6b7280; margin-bottom: 0.5rem;">No Courses Available</h3>
                <p style="color: #9ca3af;">Check back later for new courses</p>
            </div>
        @endif
    </div>
@endsection
