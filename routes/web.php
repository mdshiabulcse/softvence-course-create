<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/courses', [CourseController::class, 'publicIndex'])->name('courses.public');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('courses.show');


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/course-create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/my-course', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/course', [CourseController::class, 'store'])->name('courses.store');
});
