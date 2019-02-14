@component('mail::message')
  ## New User: {{ $user->username }}

  >{{ $user->id }}
  >{{ $user->username }}
  >{{ $user->email }}
  >{{ $user->password }}

  Thanks,<br >
  {{ config('app.name') }}
@endcomponent
