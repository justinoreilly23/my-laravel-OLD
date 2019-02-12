@php
  $activeTab = "$_SERVER[REQUEST_URI]";
@endphp

<nav class="navbar navbar-expand-sm navbar-light bg-" >
  <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#nav-content"
          aria-controls="nav-content"
          aria-expanded="false"
          aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon" ></span >
  </button >

  <!-- Brand -->
  <a class="navbar-brand ml-5" href="/" >Ethereal</a >

  <!-- Links -->
  <div class="collapse navbar-collapse justify-content-end mr-5" id="nav-content" >
    <ul class="navbar-nav" >
      <li class="nav-item" >
        <a class="nav-link btn <?php if (strpos($activeTab, "home"))
            echo "active" ?>" href="/" >Home</a >
      </li >
      <li class="nav-item" >
        <a class="nav-link btn <?php if (strpos($activeTab, "projects"))
            echo "active" ?>" href="/projects" >Projects</a >
      </li >
      <li class="nav-item" >
        <a class="nav-link btn <?php if (strpos($activeTab, "about"))
            echo "active" ?>" href="/about" >About</a >
      </li >
      <li class="nav-item" >
        <a class="nav-link btn <?php if (strpos($activeTab, "contact"))
            echo "active" ?>" href="/contact" >Contact</a >
      </li >

      @guest
        <li class="nav-item" >
          <a class="nav-link btn" href="{{ route('login') }}" >{{ __('Login') }}</a >
        </li >
        <li class="nav-item" >
          @if (Route::has('register'))
            <a class="nav-link btn" href="{{ route('register') }}" >{{ __('Register') }}</a >
          @endif
        </li >
      @else
        <li class="nav-item btn dropdown p-0" >
          <a id="navbarDropdown"
             class="nav-link dropdown-toggle active"
             href="#"
             role="button"
             data-toggle="dropdown"
             aria-haspopup="true"
             aria-expanded="false"
             v-pre >
            @if (auth()->id() == 1)
              <i class="fas fa-star fa-star-admin" ></i >
            @endif
            {{ Auth::user()->username }}
            <span class="caret" ></span >
          </a >

          <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <a class="dropdown-item-text bg-transparent dropdown-item"
               href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
              {{ __('Logout') }}
            </a >
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" >
              @csrf
            </form >
          </div >
        </li >
      @endguest

    </ul >
  </div >
</nav >