@extends('layouts.master')

@section('content')

  <div class="text-center" >
    <div class="container mb-4" >
      <a href="/projects/create" class="col-4" >
        <button class="btn btn-lg btn-primary bg-primary" >
          <i class="fas fa-plus-square mr-1" ></i >
          Create a new project
        </button >
      </a >
    </div >
  </div >

  <hr >

  <ul class="container-fluid" >
    @foreach ($projects as $project)

      <li class="project-card rounded has-shadow m-auto list-unstyled"
          style="width: 75%; margin-top: 10px !important" >
        <a href="{{ action('ProjectsController@show', $project->id) }}" >
          <div class="card text-black bg-light pb-2" >
            <div class="card-header text-muted" style="max-height: 3em;" >Project</div >
            <div class="card-body" >
              <h4 class="card-title" >{{ $project->title }}</h4 >
              <p class="card-text" >{{ $project->description }}</p >
            </div >
          </div >
        </a >
      </li >
    @endforeach
  </ul >

@endsection