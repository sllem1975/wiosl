<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'West Island Oldtimers Soccer League') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Scripts -->
  <script src="{{ asset('js/sidebar.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="/css/simple-sidebar.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript
        ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script>
    window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  {{-- <script src="../../../../assets/js/vendor/popper.min.js"></script> --}}
  {{-- <script src="../../../../dist/js/bootstrap.min.js"></script> --}}

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>


  {{-- <script src="https://kit.fontawesome.com/yourcode.js"></script> --}}
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  {{-- <script>
        setTimeout(function(){
            location.reload();
        },25000); // 5000 milliseconds means 5 seconds.
    </script> --}}

  @stack('css')
  @stack('javascript')

</head>

<body>
  <div id="app">
    <div class="d-flex" id="wrapper" class="bghome">

      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom">
          <a class="navbar-brand " href="{{ url('/') }}" title="West Island Oldtimers Soccer League">
            WIO Soccer League
          </a></div>
        <div class="list-group list-group-flush border ">
          <a href="{{ route('home.dashboard') }}"
            class="list-group-item list-group-item-action bg-light rounded">Dashboard</a>
          <a href="{{ route('matches.index') }}"
            class="list-group-item list-group-item-action bg-light rounded">Match</a>
          <a href="#" class="list-group-item list-group-item-action bg-light rounded">Teams</a>
          <a href="#" class="list-group-item list-group-item-action bg-light rounded">Players</a>
          <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action bg-light rounded">Users</a>
          <a href="{{ route('users.index') }}"
            class="list-group-item list-group-item-action bg-light rounded">Status</a>
        </div>

      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto ">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </nav>

        <div class="container-fluid ">
          {{-- <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p> --}}
          @include('partials.errors')
          @include('partials.success')
          @yield('content')

        </div>
      </div>
      <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  </div>


</body>