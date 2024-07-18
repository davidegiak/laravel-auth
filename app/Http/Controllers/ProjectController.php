<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Storage;

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
            'date' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'img_url' => 'required'
        ]);
        $newProject = new Project();
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
            'date' => 'required',
            'status' => 'required',
            'type_id' => 'required',
            'img_url' => 'required'
        ]);

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
