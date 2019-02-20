@component('mail::message')
  # You've created a new project!

  {{ $project->title }}
  {{ $project->description }}

  @component('mail::button', ['url' => url('/projects/' . $project->id)])
    View Project
  @endcomponent

  Thanks,<br >
  {{ config('app.name') }}
@endcomponent
