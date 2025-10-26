@extends('layouts.app')

@section('title', 'My Courses')

@section('content')
    <div class="container">
        <div style="display: flex; justify-content: between; align-items: center; margin-bottom: 2rem;">
            <h1 style="color: #1f2937;">My Courses</h1>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create Course
            </a>
        </div>

        @if($courses->count() > 0)
            <div style="display: grid; gap: 1.5rem;">
                @foreach($courses as $course)
                    <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 1.5rem;">
                        <div style="display: flex; gap: 1.5rem; align-items: start;">
                            @if($course->feature_image)
                                <img src="{{ Storage::url($course->feature_image) }}" alt="Course Image"
                                     style="width: 120px; height: 90px; object-fit: cover; border-radius: 6px;">
                            @else
                                <div style="width: 120px; height: 90px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-book" style="font-size: 2rem; color: #9ca3af;"></i>
                                </div>
                            @endif

                            <div style="flex: 1;">
                                <h3 style="color: #1f2937; margin-bottom: 0.5rem;">{{ $course->title }}</h3>
                                <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                                <span style="background: #3b82f6; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem;">
                                    {{ $course->category }}
                                </span>
                                    <span style="color: #6b7280; font-size: 0.875rem;">
                                    <i class="fas fa-layer-group"></i> {{ $course->modules->count() }} modules
                                </span>
                                    <span style="color: #6b7280; font-size: 0.875rem;">
                                    <i class="fas fa-play-circle"></i> {{ $course->modules->flatMap->contents->count() }} videos
                                </span>
                                </div>
                                @if($course->description)
                                    <p style="color: #6b7280; margin-bottom: 1rem;">{{ Str::limit($course->description, 150) }}</p>
                                @endif
                            </div>
                        </div>

                        <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                            <h4 style="color: #1f2937; margin-bottom: 0.5rem;">Modules:</h4>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                @foreach($course->modules as $module)
                                    <div style="background: #f9fafb; padding: 0.75rem; border-radius: 6px;">
                                        <strong style="color: #1f2937;">{{ $module->title }}</strong>
                                        <div style="margin-top: 0.5rem;">
                                            @foreach($module->contents as $content)
                                                <div style="display: flex; justify-content: between; align-items: center; padding: 0.5rem; background: white; border-radius: 4px; margin-bottom: 0.25rem;">
                                                    <span style="color: #6b7280;">{{ $content->title }}</span>
                                                    @if($content->length)
                                                        <span style="color: #9ca3af; font-size: 0.875rem;">{{ $content->length }}</span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 3rem; background: white; border-radius: 8px; border: 1px solid #e5e7eb;">
                <i class="fas fa-book" style="font-size: 3rem; color: #d1d5db; margin-bottom: 1rem;"></i>
                <h3 style="color: #6b7280; margin-bottom: 0.5rem;">No Courses Yet</h3>
                <p style="color: #9ca3af; margin-bottom: 1.5rem;">Create your first course to get started</p>
                <a href="{{ route('courses.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Your First Course
                </a>
            </div>
        @endif
    </div>
@endsection
