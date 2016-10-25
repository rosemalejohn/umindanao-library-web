<?php

namespace App\Http\Controllers\API;

use App\College;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollegeController extends Controller
{

    public function index()
    {
        $colleges = College::with(['courses' => function ($query) {
            $query->select('id');
        }])->get();

        return response()->json($colleges, 200);
    }

    public function store(Request $request)
    {
        $college = College::create($request->all());

        return response()->json($college);
    }

    public function delete(College $college)
    {
        $college->delete();
        return response()->json('Deleted!', 200);
    }

}
