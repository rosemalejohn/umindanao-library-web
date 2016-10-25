<?php

namespace App\Http\Controllers;

use App\Resource;

class ResourceController extends Controller
{
    public function index()
    {
        return view('resources.index');
    }

    public function show($id)
    {
        $resource = Resource::whereId($id)->with('visitors.course', 'visitors.college')->first();
        return view('resources.show')->with(compact('resource'));
    }
}
