<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Technology;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $tags = Tag::all();
        $technologies = Technology::all();
        // dd($projects);
        return view('admin/projects/index', compact('projects', 'tags', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('tags', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();

        // $tag_id = Tag::id();
        // $form_data['tag_id'] = $tag_id;
        $slug = Project::generateSlug($request->title);
        $form_data['slug'] = $slug;

        if ($request->hasFile('overview_image')) {
            $path = Storage::disk('public')->put('images', $request->overview_image);
            $form_data['overview_image'] = $path;
        }

        $newproject = Project::create($form_data);
        if ($request->has('technologies')) {
            $newproject->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show', ['project' => $newproject->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $tags = Tag::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'tags', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $form_data['slug'] = $slug;
        if ($request->hasFile('overview_image')) {
            if ($project->overview_image) {
                Storage::delete($project->overview_image);
            }
            $path = Storage::disk('public')->put('images', $request->overview_image);
            $form_data['overview_image'] = $path;
        }

        $project->update($form_data);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
        return redirect()->route('admin.projects.index')->with('message', "$project->title updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->action([ProjectController::class, 'index'])->with('message', "$project->title deleted");
    }
}
