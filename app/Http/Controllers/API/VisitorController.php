<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $members = Visitor::with('course', 'college')->get();

        return response()->json($members, 200);
    }

    public function students()
    {
        $students = Visitor::students()->with('course', 'college')->get();

        return response()->json($students, 200);
    }

    public function faculties()
    {
        $faculties = Visitor::faculties()->get();

        return response()->json($faculties, 200);
    }

    public function delete(Visitor $visitor)
    {
        $visitor->delete();
        return response()->json('Member deleted!', 200);
    }

    public function update(Request $request, Visitor $visitor) 
    {   
        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'id_number' => 'required|max:6|min:6',
            'type' => 'required',
        ]);

        $visitor->update($request->all());

        $visitor->college = $visitor->college;
        $visitor->course = $visitor->course;

        return response()->json($visitor, 200);
    }
}
