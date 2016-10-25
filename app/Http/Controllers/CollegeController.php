<?php

namespace App\Http\Controllers;

use App\College;

class CollegeController extends Controller
{
    public function index()
    {
        return view('colleges.index');
    }

    public function show(College $college)
    {
        $college->courses = $college->courses;

        return view('colleges.show')->with(compact('college'));
    }
}
