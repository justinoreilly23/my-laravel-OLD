@extends('layouts.master')

@section('content')
  <div class="container-fluid" >

    <div class="box bg-light" style="border: 0 !important;" >
      <form method="POST" action="{{action('ProjectsController@update', $project->id)}}" id="submit" >

        @method('PATCH')
        @csrf

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
                    rows="5"
                    cols="45"
                    placeholder="Project description"
                    required >{{ $project->description }}</textarea >
        </div >
      </form >

      <form method="POST" action="{{action('ProjectsController@destroy', $project->id)}}" id="delete" >

        @method('DELETE')
        @csrf

        @if ($errors->any())
          <div class="notification is-danger mt-3 mb-0" >
            <ul class="list-group" >
              @foreach ($errors->all() as $error)
                <li class="list-group-item bg-danger text-white p-1 w-auto border-0" >{{ $error }}</li >
              @endforeach
            </ul >
          </div >
        @endif
      </form >
      <div class="p-4 box" style="width:fit-content" >
        <button type="submit" class="btn btn-primary bg-primary mr-2 ml-0" form="submit" >Update</button >
        <button type="submit" class="btn btn-danger bg-danger mr-2 ml-0" form="delete" >Delete</button >
      </div >
    </div >
  </div >

@endsection