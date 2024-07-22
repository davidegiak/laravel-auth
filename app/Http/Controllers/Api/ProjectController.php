<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index () {
       return response()->json([
        'success' => true,
        'projects' => Project::orderByDesc('id')->paginate()
       ]);
    }
    public function latest()
    {
        return response()->json([
            'success' => true,
            'projects' => Project::orderByDesc('id')->take(3)->get()
        ]);
    }

    public function show($id)
    {

        //dd($slug);
        $project = Project::where('id', $id)->first();
        //dd($project);


        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'not found'
            ]);
        }
    }
}
