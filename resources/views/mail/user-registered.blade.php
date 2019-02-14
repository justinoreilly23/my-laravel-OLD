@component('mail::message')
  ## New User: {{ $user->username }}

  - {{ $user->id }}
  - {{ $user->username }}
  - {{ $user->email }}

  Thanks,<br >
  {{ config('app.name') }}
@endcomponent

