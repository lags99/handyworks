<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name'.'| Backend', "HandyWorks | Backend") }}</title>
    @laravelPWA
</head>
<body>
    @auth('admin')
        @include('includes.admin-navbar')
    @endauth
    <div class="container mt-5">
          @yield('admin-content')
    </div>
    <script src="https://kit.fontawesome.com/f43319387c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>