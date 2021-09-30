<!doctype html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">
   <script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <title>@yield("app-title", "Pictures information book")</title>
</head>
<body class="text-center">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">@yield("app-title")</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="/">Home</a>
                <a class = "nav-link" href="/pictures">Pictures</a>
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
