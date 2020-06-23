<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Perpustakaan PPU</title>
</head>
<body>
    <div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
          <a href="{{route('homepage')}}" class="brand-logo"><b>Perpus</b>PPU</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            @guest
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Registrasi</a></li>
            @else 
            <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{route('dashboard')}}">My Dashboard</a></li>
            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            </ul>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{auth()->user()->name}}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
          </ul>
        </div>
      </nav>
    </div>
      <ul class="sidenav" id="mobile-demo">
        @guest
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Registrasi</a></li>
        @endguest
      </ul>
      @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        M.AutoInit();
    </script>
    @yield('script')
</body>
</html>