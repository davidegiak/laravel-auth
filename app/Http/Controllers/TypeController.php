<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Type::all();
        $data = [
            'type' => $type,
        ];
        return view('admin.types.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'task' => 'required',
            'icon' => 'required',
        ]);
        $newType = new Type();
        $newType->fill($data);
        $newType->save();
        return redirect()->route('admin.types.index', $newType);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $data = [
            'type' => $type,
            'projects' => Project::all(),
        ];
        return view('admin.types.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $data = [
            'type' => $type
        ];
        return view('admin.types.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'task' => 'required',
            'icon' => 'required',
        ]);
        $type->update($data);
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
