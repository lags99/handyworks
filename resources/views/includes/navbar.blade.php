{{-- <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
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
</nav> --}}
<div class="navigation-bar">
  <div class="navigation-bar__container">
    <div class="navigation-bar__back">
      <a href="#" class="navigation-bar__back__btn" id="back">
        <i class="fas fa-arrow-left"></i>
      </a>
    </div>
    <div class="navigation-bar__logo">
      <img src="{{ asset('img/hw.png') }}" alt="Logo">
    </div>
    <div class="navigation-bar__menu">
      <a href="#" class="navigation-bar__menu__btn" id="menu-btn">
        <i class="fas fa-bars"></i>
      </a>
    </div>
  </div>
</div>
<div class="side-navigation">
  <ul class="side-navigation__list" id="nav_list">
    <li class="side-navigation__list__item side-navigation__close" id="close">
      <a href="#" class="side-navigation__close__btn">
        <i class="fas fa-times"></i>
      </a>
    </li>
    <li class="side-navigation__list__item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Home</a></li>
    <li class="side-navigation__list__item"><a href="{{route('blog')}}"><i class="fas fa-newspaper"></i> News & Blog</a></li>
    <li class="side-navigation__list__item"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Sign In</a></li>
    <li class="side-navigation__list__item"><a href="{{ route('pre_register') }}"><i class="fas fa-user-plus"></i> Sign Up</a></li>
  </ul>
</div>
