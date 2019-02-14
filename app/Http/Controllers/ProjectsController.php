<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Project;
use App\Mail\ProjectCreated;


class ProjectsController extends Controller {

    public static function index()
    {
//        $projects = auth()->id()->projects;

        $projects = Project::all()->where('owner_id', auth()->id());

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

    public function store()
    {
        $attributes = request()->validate([
                                              'title'       => ['required', 'min:3', 'max:32'],
                                              'description' => ['required', 'min:3'],
                                          ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);


        \Mail::to(env('MAIL_TO'))->send(new ProjectCreated($project));

        return redirect('/projects');
    }

    public function edit(Project $project) // example.com/projects/id/edit
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = request()->validate(
            [
                'title'       => ['required', 'min:3', 'max:32'],
                'description' => ['required', 'min:3', 'max:1024'],
            ]);

        $project->update($attributes);

        return view('projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}


