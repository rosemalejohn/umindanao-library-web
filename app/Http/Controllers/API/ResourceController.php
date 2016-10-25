<?php

namespace App\Http\Controllers\API;

use App\Events\NewResourceVisit;
use App\Http\Controllers\Controller;
use App\Resource;
use Illuminate\Http\Request;
use Excel;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::all();

        return response()->json($resources, 200);
    }

    public function show(Resource $resource)
    {
        return response()->json($resource, 200);
    }

    public function store(Request $request)
    {
        $resource = Resource::create($request->all());
        return response()->json($resource);
    }

    public function update(Request $request, Resource $resource)
    {
        $resource->update($request->all());

        return response()->json($resource);
    }

    public function delete(Resource $resource)
    {
        $resource->delete();

        return response()->json('Resources deleted!');
    }

    public function visit(Request $request, Resource $resource)
    {
        $resource->visitors()->attach($request->user_id);

        event(new NewResourceVisit($resource));

        return response()->json('Saved', 200);
    }

    public function export(Resource $resource) {
        $visitors = $resource->visitors;

        $path = storage_path('app/public/resource.xlsx');

        Excel::load($path, function($excel) use ($resource, $visitors) {
            $sheet = $excel->sheet('Sheet1');
            $startIndex = 4;

            $sheet->setCellValue('A1', $resource->name);

            foreach ($visitors as $key => $visitor) {
                $index = $key + $startIndex;

                $sheet->setCellValue("A{$index}", $visitor->full_name);
                $sheet->setCellValue("B{$index}", $visitor->type);
                $sheet->setCellValue("C{$index}", $visitor->course ? $visitor->course->name : null);
                $sheet->setCellValue("D{$index}", $visitor->college ? $visitor->college->name : null);
                $sheet->setCellValue("E{$index}", $visitor->created_at->toFormattedDateString());
                $sheet->setCellValue("F{$index}", $visitor->created_at->toTimeString());
            }

        })->export('xlsx');
    }
}
