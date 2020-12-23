<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HandyWorks') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @laravelPWA
</head>
<body>
    @auth('admin')
         <div class="container">
             <div class="row py-3">
                 <div class="col">
                     <a href="{{ route('posts') }}" class="btn btn-primary">Go Back</a>
                 </div>
             </div>
         </div>
         @else
         @include('includes.navbar')
    @endauth
     
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
 <!-- Scripts -->
 <script src="https://kit.fontawesome.com/f43319387c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</html>
