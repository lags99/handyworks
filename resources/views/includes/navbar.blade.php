<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}"><img width="150px" src="{{ asset('img/hw.png') }}"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
            @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{route('index')}}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('login')}}">Sign In</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('pre_register')}}">Sign Up</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('blog') }}">Blog</a>
              </li>
              <li class="nav-item">
                  <a class="btn btn-warning" href="#">Book A Service</a>
              </li>
              
            @else
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-fluid rounded-circle" style="width: 20px" src="{{ auth()->user()->getAvatar() }}">  {{ Auth::user()->full_name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                    
                    <form action="{{route('logout')}}" id="logout-form" method="POST" style="display:none;">@csrf</form>
                  </div>
              </li>
        @endguest
    </ul>
  </div>
    </div>
</nav>
{{-- <div class="custom-navbar bg-light">
    <div class="container d-flex">
      <div class="custom-navbar-logo">
        <a href="{{route('index')}}"><img width="150px" src="{{ asset('img/hw.png') }}"></a>
      </div>
      <nav class="custom-navbar-navigation">
        <ul class="custom-navbar-list">
          <li class="custom-navbar-item"><a href="{{ route('index') }}" class="custom-navbar-link">Home</a></li>
          <li class="custom-navbar-item"><a href="{{ route('login') }}" class="custom-navbar-link">Sign In</a></li>
          <li class="custom-navbar-item"><a href="{{ route('register') }}" class="custom-navbar-link"></a></li>
        </ul>
      </nav>
    </div>
</div> --}}