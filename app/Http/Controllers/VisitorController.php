<?php

namespace App\Http\Controllers;

class VisitorController extends Controller
{

    public function students()
    {
        return view('visitors.students');
    }

    public function faculties()
    {
        return view('visitors.faculties');
    }

}
