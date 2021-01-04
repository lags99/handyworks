{{-- <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}"><img width="150px" src="{{ asset('img/hw.png') }}" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('backend') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('posts') }}" class="nav-link">View Posts</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('interviews') }}" class="nav-link">Scheduled Interviews</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::guard('admin')->user()->username }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
              <a class="nav-link" href="{{ route('city') }}" >Cities</a>
              @if (auth()->user()->blog_writer)
                <a class="nav-link" href="{{ route('post_create') }}" >New Post</a>                  
              @endif

              <form action="{{route('logout')}}" id="logout-form" method="POST" style="display:none;">@csrf</form>
            </div>
        </li>
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
    <li class="side-navigation__list__item"><a href="{{ route('backend') }}"><i class="fas fa-users"></i> Dashboard</a></li>
    <li class="side-navigation__list__item"><a href="{{ route('interviews') }}"><i class="fas fa-calendar-week"></i> Scheduled Interviews</a></li>
    <li class="side-navigation__list__item"><a href="{{ route('posts') }}"><i class="far fa-newspaper"></i> View Posts</a></li>
    @if (auth()->user()->blog_writer)
    <li class="side-navigation__list__item"><a href="{{ route('post_create') }}" ><i class="fas fa-plus-circle"></i> New Post</a></li>
    @endif
    <li class="side-navigation__list__item"><a href="{{ route('city') }}" ><i class="fas fa-city"></i> City List</a></li>
    <li class="side-navigation__list__item"><a href="{{ route('services') }}" ><i class="fas fa-list"></i> Services List</a></li>
    <li class="side-navigation__list__item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
  </ul>
  <form action="{{route('logout')}}" id="logout-form" method="POST" style="display:none;">@csrf</form>
</div>