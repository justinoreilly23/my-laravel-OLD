<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\User;
use Illuminate\Http\Request;
use App\Project;


class ProjectsController extends Controller {

    public static function index()
    {
        $projects = Project::where('owner_id', auth()->id())->simplePaginate(4);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create($request->all());

        return redirect('/projects');
    }

    public function edit(Project $project) // example.com/projects/id/edit
    {
        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request)
    {
        Project::update($request->all());

        return view('projects.show');
    }

    public function destroy()
    {
        Project::delete();

        return redirect('/projects');
    }
}


