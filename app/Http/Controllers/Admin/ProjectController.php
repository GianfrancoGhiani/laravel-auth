<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function store(Request $request)
    {
        $form_data = $request->all();

        // $newproject = new Project();
        // $newproject->title = $form_data['title'];
        // $newproject->slug = Str::slug($form_data['title'], '-');
        // $newproject->content = $form_data['content'];
        // $newproject->save();

        $slug = Project::generateSlug($request->title);
        $form_data['slug'] = $slug;
        $newproject = Project::create($form_data);

        return redirect()->route('admin.projects.show', ['project' => $newproject->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $project = Project::where('slug', '=', $slug)
        //     ->get();
        $project = DB::table('projects')
            ->where('slug', '=', $slug)
            ->get()[0];
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $project = DB::table('projects')
            ->where('slug', '=', $slug)
            ->get()[0];
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
    public function update(Request $request, $slug)
    {
        $form_data = $request->all();
        $temporary_project = DB::table('projects')
            ->where('slug', '=', $slug)
            ->get()[0];
        $project = Project::find($temporary_project->id);
        $project->title = $form_data['title'];
        $project->slug = Str::slug($form_data['title'], '-');
        $project->content = $form_data['content'];
        $project->update();
        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $temporary_project = DB::table('projects')
            ->where('slug', '=', $slug)
            ->get()[0];
        $project = Project::find($temporary_project->id);
        $project->delete();
        return redirect()->action([ProjectController::class, 'index']);
    }
}
