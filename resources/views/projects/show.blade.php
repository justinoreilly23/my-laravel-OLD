@extends('layouts.master')

@section('content')

  <div class="list-group-flush container box bg-light p-5 col-md-8" >
    <div class="w-100 row align-items-center" >
      <div class="w-75" >
        <h1 ><b >{{ $project->title }}</b ></h1 >
      </div >
      @can('interact', $project)
        <div class="w-25" >
          <ul class="m-0 align-items-baseline float-right" >
            <li class="list-inline-item" >
              <a href="{{ action('ProjectsController@edit', $project->id) }}" >
                <button class="btn-i-warning btn pl-0 pr-0 " >
                  <i class="fas fa-edit fa-2x" ></i >
                </button >
              </a >
            </li >

            <li class="list-inline-item" >
              <form method="POST" action="{{action('ProjectsController@destroy', $project)}}" >
                @method('delete')
                @csrf
                <button type="submit"
                        class="btn-i-danger btn pl-0 pr-0"
                        onclick="return confirm('Delete {{ $project->title }}?')" >
                  <i class="fas fa-trash fa-2x" ></i >
                </button >
              </form >
            </li >
          </ul >
        </div >
      @endcan

      <div class="list-group-item list-group-item-action flex-column align-items-start bg-light" >
        <div class="d-flex justify-content-between" >
          <div >
            <h4 >Description</h4 >
          </div >
          <div class="w-100" >
            <a href="{{ action('ProjectsController@edit', $project->id) }}" >
              <button class="btn btn-i-warning btn-i-sm p-1" >
                <i class="fas fa-edit fa-large i-sm" ></i >
              </button >
            </a >
          </div >
        </div >
        <p class="box" >"{{ $project->description }}"</p >
      </div >


      <div class="list-group-item list-group-item-action flex-column align-items-start bg-light" >
        <div class="d-flex justify-content-between" >
          <h4 >Tasks</h4 >
        </div >
        @if ($project->tasks->count())
          <div class="box" >
            @foreach($project->tasks as $task)
              <div class="@if($task->completed) hidden @endif" >
                <form method="POST" action="/completed-tasks/{{ $task->id }}" >

                  @if ($task->completed)
                    @method('DELETE')
                  @endif
                  @csrf

                  <label class="{{ $task->completed ? 'is-complete' : '' }}" for="completed" >
                    <input type="checkbox"
                           name="completed"
                           onChange="this.form.submit();" {{ $task->completed ? 'checked' : '' }}>
                    {{ $task->description }}
                  </label >
                </form >
              </div >
            @endforeach
          </div >
        @endif

        @include('partials.errors')

        @can('interact', $project)
          <form method="POST" action="/projects/{{ $project->id }}/tasks" class="mb-3" id="add-task" >

            @method('POST')
            @csrf

            <div class="field" >
              <label for="description" class="label text-muted text-small" ></label >
              <div class="control row" >
                <div class="col-md-6" >
                  <input type="text" class="input" name="description" placeholder="...buy supplies" >
                </div >
                <div class="col-md-6" >
                  <button type="submit" class="button btn-plus" form="add-task" ><i class="fa fa-plus" ></i ></button >
                </div >
              </div >
            </div >
          </form >
        @endcan
      </div >
    </div >
  </div >
@endsection