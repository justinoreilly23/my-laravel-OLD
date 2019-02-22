@extends('layouts.master')

@section('content')
  <div class="container-fluid col-xl-10 col-lg-10 box bg-light" >
    <form method="POST" action="/projects" id="create" >

      {{ csrf_field() }}

      <div class="container-fluid" >
        <div class="form-group" >
          <h5 ><label for="title" >Title</label ></h5 >
          <input type="text"
                 class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}"
                 name="title"
                 placeholder="Project title"
                 value="{{ old('title') }}"
                 required >
        </div >

        <div class="form-group" >
          <h5 ><label for="description" >Description</label ></h5 >
          <textarea name="description"
                    class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}"
                    rows="5"
                    cols="45"
                    placeholder="Project description"
                    required >{{ old('title')}}</textarea >
        </div >
      </div >
    </form >
    <div class="container-fluid" >
      <div class="columns row" >
        <div class="column is-4-desktop is-6-tablet is-7-mobile" >
          <button type="submit" class="w-100 btn btn-info bg-info btn-solid-{{ $theme }}" form="create" >
            Create new project
          </button >
        </div >
        <div class="column is-2-desktop is-4-tablet  is-5-mobile" >
          <a href="{{ action('ProjectsController@index') }}" >
            <button class="w-100 btn btn-secondary bg-secondary btn-solid-{{ $theme }}" >
              Cancel
            </button >
          </a >
        </div >
      </div >
      @include('partials.errors')
    </div >
  </div >
@endsection