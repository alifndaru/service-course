<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ImageCourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MyCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// MENTORS
Route::get('mentors', [MentorController::class, 'index']);
Route::get('mentors/{id}', [MentorController::class, 'show']);
Route::post('mentors', [MentorController::class, 'create']);
Route::put('mentors/{id}', [MentorController::class, 'update']);
Route::delete('mentors/{id}', [MentorController::class, 'destroy']);

// COURSES
Route::get('courses', [CourseController::class, 'index']);
Route::post('courses', [CourseController::class, 'create']);
Route::put('courses/{id}', [CourseController::class, 'update']);
Route::delete('courses/{id}', [CourseController::class, 'destroy']);

// chapters
Route::get('chapters', [ChapterController::class,'index']);
Route::post('chapters', [ChapterController::class, 'create']);
Route::put('chapters/{id}', [ChapterController::class, 'update']);
Route::get('chapters/{id}', [ChapterController::class, 'show']);
Route::delete('chapters/{id}', [ChapterController::class, 'destroy']);

// lesson
Route::get('lessons', [LessonController::class, 'index']);
Route::post('lessons', [LessonController::class, 'create']);
Route::put('lessons/{id}', [LessonController::class, 'update']);
Route::get('lessons/{id}', [LessonController::class, 'show']);
Route::delete('lessons/{id}', [LessonController::class, 'destroy']);


// image course
Route::post('image-courses', [ImageCourseController::class, 'create']);
Route::delete('image-courses/{id}', [ImageCourseController::class, 'destroy']);

// mycourse
Route::post('my-courses', [MyCourseController::class, 'create']);