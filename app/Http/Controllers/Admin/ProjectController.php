<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
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

        return view('admin/projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
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

        // $newproject = new Project();
        // $newproject->title = $form_data['title'];
        // $newproject->slug = Str::slug($form_data['title'], '-');
        // $newproject->content = $form_data['content'];
        // $newproject->save();

        $slug = Project::generateSlug($request->title);
        $form_data['slug'] = $slug;
        if ($request->hasFile('overview_image')) {
            $path = Storage::disk('public')->put('images', $request->overview_image);
            $form_data['overview_image'] = $path;
        }

        $newproject = Project::create($form_data);

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
        // $project = Project::where('slug', '=', $slug)
        //     ->get();

        // $project = DB::table('projects')
        //     ->where('slug', '=', $slug)
        //     ->get()[0];

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
        // $project = DB::table('projects')
        //     ->where('slug', '=', $slug)
        //     ->get()[0];
        // dd($project);

        return view('admin.projects.edit', compact('project'));
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
        // $temporary_project = DB::table('projects')
        //     ->where('slug', '=', $slug)
        //     ->get()[0];
        // $project = Project::find($temporary_project->id);

        // $project->title = $form_data['title'];
        // $project->slug = Str::slug($form_data['title'], '-');
        // $project->content = $form_data['content'];

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
        return redirect()->route(
            'admin.projects.index'
            /** */
        )->with('message', "$project->title updated"); //, ['project' => $project->slug]
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $temporary_project = DB::table('projects')
        //     ->where('slug', '=', $slug)
        //     ->get()[0];
        // $project = Project::find($temporary_project->id);
        $project->delete();
        return redirect()->action([ProjectController::class, 'index'])->with('message', "$project->title deleted");
    }
}
