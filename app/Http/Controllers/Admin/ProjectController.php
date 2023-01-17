<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Category;
use App\Models\Language;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $categories = Category::all();
        $languages = Language::all();
        return view('admin.projects.create', compact('categories', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->name_project);
        $data['slug'] = $slug;
        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('project_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $new_project = Project::create($data);

        if($request->has('languages')){
            $new_project->languages()->attach($request->languages);
        }
        return redirect()->route('admin.projects.show', $new_project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $languages = Language::all();
        return view('admin.projects.edit', compact('project','categories', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->name_project);
        $data['slug'] = $slug;
        if($request->hasFile('cover_image')){
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::disk('public')->put('project_images', $request->cover_image);
            $data['cover_image'] = $path;
        }
        $project->update($data);

        // dd($request->languages);
        if($request->has('languages')){
            $project->languages()->sync($request->languages);
        } else {
            $project->languages()->sync([]);
        }


        return redirect()->route('admin.projects.index')->with('message', "$project->name_project updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     *
     */
    public function destroy(Project $project)
    {
        if($project->cover_image){
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->name_project deleted successfully");
    }
}
