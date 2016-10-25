<?php

namespace App\Http\Controllers;

use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $course->students = $course->students;

        return view('courses.show')->with(compact('course'));
    }
}
