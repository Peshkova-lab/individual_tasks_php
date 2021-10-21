<!doctype html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">
   <script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
   <script src="{{ asset("js/popper.min.js") }}"></script> 
   <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <title>@yield("app-title", "Pictures information book")</title>
</head>
<body class="text-center">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
        <h3 class="masthead-brand">@yield("app-title")</h3>

        <nav class="nav nav-masthead justify-content-end">
                        <!-- Authentication Links -->
                        @guest
                          <a class="nav-link" href="{{ route('login') }}">Login</a>
                          @if (Route::has('register'))
                               
                             <a class="nav-link" href="{{ route('register') }}">Register</a>

                            @endif
                        @else
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        @endguest
                </nav>


            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="/">Home</a>
                <a class = "nav-link" href="/author/0/pictures">Pictures</a>
                <a class="nav-link" href="/authors">Authors</a>
                <a class="nav-link" href="/about">About</a>
            </nav>
        </div>
    </header>
    <main role="main" class="inner cover">
        <h1 class="cover-heading">@yield("page-title")</h1>

        @yield("page-content")
    </main>
    <footer class="mastfoot mt-auto">
        <div class="inner">
            @yield("page-footer")
        </div>
    </footer>
</div>
</body>
</html>
