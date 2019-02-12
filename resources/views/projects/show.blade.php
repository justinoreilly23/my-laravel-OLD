@extends('layouts.master')

@section('content')

  <div class="list-group-flush container box bg-light p-5" >
    <div class="w-70 row align-items-center" >
      <h1 ><b >{{ $project->title }}</b ></h1 >
      @can('interact', $project)
        <div class="row" >
          <ul class="m-0 align-items-baseline" >
            <li class="list-inline-item" >
              <a href="{{ action('ProjectsController@edit', $project->id) }}" >
                <i class="fas fa-edit fa-2x" ></i >
              </a >
            </li >

            <li class="list-inline-item" >
              <form method="POST" action="{{action('ProjectsController@destroy', $project)}}" >
                @method('delete')
                @csrf
                <button type="submit"
                        class="btn-i-primary" >
                  <i class="fas fa-trash fa-2x" ></i >
                </button >
              </form >
            </li >
          </ul >
        </div >
      @endcan

      <div class="list-group-item list-group-item-action flex-column align-items-start bg-light" >
        <div class="d-flex w-100 justify-content-between" >
          <h4 class="" >Description</h4 >
        </div >
        <p class="box" >"{{ $project->description }}"</p >
      </div >

      <div class="list-group-item list-group-item-action flex-column align-items-start bg-light" >
        <div class="d-flex w-100 justify-content-between" >
          <h4 >Tasks</h4 >
        </div >

        @if ($project->tasks->count())
          <div class="box" >
            @foreach($project->tasks as $task)
              <div class="p-1 @if($task->completed) hidden @endif" >
                <form method="POST" action="/completed-tasks/{{ $task->id }}" >

                  @if ($task->completed)
                    @method('DELETE')
                  @endif

                  @csrf

                  <label class="p-1 {{ $task->completed ? 'is-complete' : '' }}" for="completed" >
                    <input type="checkbox"
                           name="completed"
                           onChange="this.form.submit();" {{ $task->completed ? 'checked' : '' }}>
                    {{ $task->description }}
                  </label >
                </form >
              </div >
            @endforeach

            @include('partials.errors')

          </div >
        @endif

        @can('interact', $project)
          <form method="POST" action="/projects/{{ $project->id }}/tasks" class="mb-3" >

            @method('POST')
            @csrf

            <div class="field" >
              <label for="description" class="label text-muted text-small" ></label >

              <div class="control" >
                <input type="text" class="input w-25" name="description" placeholder="Quick task" >
                <button type="submit" class="button btn-plus" ><i class="fa fa-plus" ></i ></button >
              </div >
            </div >
          </form >
        @endcan
      </div >
    </div >
  </div >
@endsection