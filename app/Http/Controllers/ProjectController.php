<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectList = Project::all();
        $data = [
            'project' => $projectList,
        ];
        return view('admin.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'type' => Type::all(),
        ];
        return view('admin.projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'nullable',
            'status' => 'nullable',
            'type_id' => 'nullable',
            'img_url' => 'nullable',
            'git_url' => 'nullable'
        ]);
        $newProject = new Project();

        if ($request->has('img_url')) {
            // save the image

            $image_path = Storage::put('uploads', $request->img_url);
            $data['img_url'] = $image_path;
            //dd($image_path, $val_data);
        }
        $newProject->fill($data);
        $newProject->save();
        return redirect()->route('admin.projects.index', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            'project' => $project
        ];
        return view('admin.projects.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            'project' => $project,
            'type' => Type::all(),
        ];
        return view('admin.projects.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'nullable',
            'status' => 'nullable',
            'type_id' => 'nullable',
            'img_url' => 'nullable',
            'git_url' => 'nullable',
        ]);
        if ($request->has('img_url')) {
            // save the image

            $image_path = Storage::put('uploads', $request->img_url);
            $data['img_url'] = $image_path;
            //dd($image_path, $val_data);
        }
        if ($project->img_url && !Str::startsWith($project->img_url, 'http')) {
            # code...
            Storage::delete($project->img_url);
        }
        $project->update($data);
        return redirect()->route('admin.projects.show', $project);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
