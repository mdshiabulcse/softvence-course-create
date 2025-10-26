@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <div class="container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div
                style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 2rem;">
                <div style="display: flex; gap: 2rem; align-items: start;">
                    @if($course->feature_image)
                        <img src="{{ Storage::url($course->feature_image) }}" alt="Course Image"
                             style="width: 200px; height: 150px; object-fit: cover; border-radius: 6px;">
                    @else
                        <div
                            style="width: 200px; height: 150px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-book" style="font-size: 3rem; color: #9ca3af;"></i>
                        </div>
                    @endif

                    <div style="flex: 1;">
                        <h1 style="color: #1f2937; margin-bottom: 0.5rem;">{{ $course->title }}</h1>
                        <div
                            style="background: #3b82f6; color: white; padding: 0.25rem 1rem; border-radius: 20px; display: inline-block; margin-bottom: 1rem;">
                            {{ $course->category }}
                        </div>

                        @if($course->description)
                            <p style="color: #6b7280; margin-bottom: 1rem; line-height: 1.6;">{{ $course->description }}</p>
                        @endif

                        <div style="display: flex; gap: 2rem; color: #6b7280;">
                            <span><i class="fas fa-layer-group"></i> {{ $course->modules->count() }} modules</span>
                            <span><i class="fas fa-play-circle"></i> {{ $course->modules->flatMap->contents->count() }} videos</span>
                            <span><i class="fas fa-user"></i> {{ $course->user->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h2 style="color: #1f2937; margin-bottom: 1.5rem;">Course Content</h2>

                @if($course->modules->count() > 0)
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($course->modules as $module)
                            <div class="module-item"
                                 style="border: 1px solid #e5e7eb; border-radius: 6px; overflow: hidden;">
                                <div style="background: #f9fafb; padding: 1rem; border-bottom: 1px solid #e5e7eb;">
                                    <h3 style="color: #374151; margin: 0;">
                                        <i class="fas fa-folder"></i> {{ $module->title }}
                                    </h3>
                                </div>

                                <div style="padding: 0;">
                                    @foreach($module->contents as $content)
                                        <div
                                            style="display: flex; justify-content: between; align-items: center; padding: 1rem; border-bottom: 1px solid #f3f4f6;">
                                            <div style="display: flex; align-items: center; gap: 1rem;">
                                                <i class="fas fa-play-circle" style="color: #3b82f6;"></i>
                                                <span style="color: #374151;">{{ $content->title }}</span>
                                            </div>
                                            @if($content->length)
                                                <span
                                                    style="color: #6b7280; font-size: 0.875rem;">{{ $content->length }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 3rem; color: #6b7280;">
                        <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                        <p>No modules available for this course.</p>
                    </div>
                @endif
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <a href="{{ route('courses.public') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Back to Courses
                </a>
            </div>
        </div>
    </div>
@endsection
