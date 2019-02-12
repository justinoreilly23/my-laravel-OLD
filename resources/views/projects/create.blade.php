@extends('layouts.master')

@section('content')

  <div class="form-group" >
    <form method="POST" action="/projects" >

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
                    required >{{ old('title', "")}}</textarea >
        </div >

        <div >
          <button type="submit" class="btn btn-primary bg-primary btn-solid-{{ $theme }} w-25" >Create new project</button >
        </div >
      </div >

      @include('partials.errors')

    </form >
  </div >
@endsection