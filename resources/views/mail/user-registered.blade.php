@component('mail::message')

  #**New User:** {{$user->username}}, on {{$user->created_at}}


  @component('mail::table')

    | ID   | Username | Email | Date |
    | :--- | :------- | :---- | :--- |
    |{{$user->id}}|{{$user->username}}|{{$user->email}}|{{$user->created_at}}|
  @endcomponent

  <br >

  Thanks,<br >
  {{ config('app.name') }}

@endcomponent