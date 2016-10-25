<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('college')->get();

        return response()->json($courses, 200);
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());

        $course->college = $course->college;

        return response()->json($course);
    }

    public function delete(Course $course)
    {
        $course->delete();

        return response('Course deleted!', 200);
    }
}
