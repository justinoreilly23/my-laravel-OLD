@if ($errors->any())
  <div class="notification bg-danger text-white m-3" >
    <ul class="m-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li >
      @endforeach
    </ul >
  </div >
@endif