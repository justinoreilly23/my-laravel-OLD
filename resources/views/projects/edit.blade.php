@extends('layouts.master')


@section('content')
  <div class="container-fluid col-xl-10 col-lg-10 box bg-light" >
    <form method="POST" action="{{action('ProjectsController@update', $project->id)}}" id="update" >

      @method('PATCH')
      @csrf
      <div class="container-fluid" >
        <div class="form-group" >
          <label for="title" ><b >Title</b ></label >
          <input type="text"
                 class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}"
                 name="title"
                 placeholder="Project title" value="{{ $project->title }}"
                 required >
        </div >

        <div class="form-group" >
          <label for="description" ><b >Description</b ></label >
          <textarea name="description"
                    class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}"
                    rows="8"
                    cols="45"
                    placeholder="Project description"
                    required >{{ $project->description }}</textarea >
        </div >
      </div >
    </form >
    <div class="container-fluid" >
      <div class="form-group row">
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-8" >
          <button type="submit" class="btn btn-success bg-success w-100" form="update" >Save</button >
        </div >
        <div class="col-xl-1 col-lg-1 col-md-4 col-sm-4" >
          <a href="{{action('ProjectsController@show', $project->id)}}" class="w-100" >
            <button class="btn border-primary" >Cancel</button >
          </a >
        </div >
      </div >
    </div >
    @include('partials.errors')
  </div >
@endsection