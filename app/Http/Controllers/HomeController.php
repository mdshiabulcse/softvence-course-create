<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $courses = Course::with(['user', 'modules.contents'])
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('courses'));
    }

    public function index()
    {
        return view('dashboard');
    }
}
