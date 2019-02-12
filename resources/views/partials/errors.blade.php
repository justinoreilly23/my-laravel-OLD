@if ($errors->any())
  <div class="notification w-25" >
    <ul class="list-group" >
      @foreach ($errors->all() as $error)
        <li class="list-group-item bg-danger text-white p-2 mb-0 w-auto border" >{{ $error }}</li >
      @endforeach
    </ul >
  </div >
@endif