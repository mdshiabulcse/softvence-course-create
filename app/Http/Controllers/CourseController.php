<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Exception;

class CourseController extends Controller
{
    public function publicIndex()
    {
        $courses = Course::with(['user', 'modules.contents'])->latest()->get();
        return view('public-index', compact('courses'));
    }

    public function index()
    {
        $courses = Course::with(['modules.contents'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('index', compact('courses'));
    }

    public function create()
    {
        return view('course-create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'description' => 'nullable|string',
                'featureVideo' => 'required|file|mimes:mp4,avi,mov,wmv|max:102400',
                'featureImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
                'modules' => 'required|array|min:1',
                'modules.*.title' => 'required|string|max:255',
                'modules.*.contents' => 'required|array|min:1',
                'modules.*.contents.*.title' => 'required|string|max:255',
                'modules.*.contents.*.video' => 'required|file|mimes:mp4,avi,mov,wmv|max:102400',
                'modules.*.contents.*.length' => 'nullable|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed please try again',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            $featureVideoPath = $request->file('featureVideo')->store('courses/feature-videos', 'public');
            $featureImagePath = $request->hasFile('featureImage') ?
                $request->file('featureImage')->store('courses/feature-images', 'public') : null;

            $course = Course::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description,
                'feature_video' => $featureVideoPath,
                'feature_image' => $featureImagePath,
            ]);

            foreach ($request->modules as $moduleData) {
                $module = $course->modules()->create([
                    'title' => $moduleData['title']
                ]);

                foreach ($moduleData['contents'] as $contentData) {
                    $videoPath = $contentData['video']->store('courses/content-videos', 'public');
                    $module->contents()->create([
                        'title' => $contentData['title'],
                        'video' => $videoPath,
                        'length' => $contentData['length'] ?? null,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Course created successfully!',
                'redirect' => route('courses.index')
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create course please try again',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Course $course)
    {
        $course->load(['user', 'modules.contents']);
        return view('show', compact('course'));
    }
}
