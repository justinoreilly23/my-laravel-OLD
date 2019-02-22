@component('mail::message')

  # You've created a new project!

  ***

  ##### Project details
  @component('mail::panel')
    Name: {{ $project->title }}
    Description: {{ $project->description }}
    Date created: {{ $project->created_at }}
  @endcomponent

  @component('mail::button', ['url' => url('/projects/' . $project->id)])
    View project
  @endcomponent

  Thanks,<br >
  {{ config('app.name') }}

@endcomponent
