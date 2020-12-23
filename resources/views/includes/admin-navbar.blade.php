<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
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
          <a href="{{ route('posts') }}" class="nav-link">View Post</a>
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
</nav>