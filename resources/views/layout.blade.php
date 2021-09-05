<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>@yield("app-title", "Pictures information book")</title>
</head>
<body>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/pictures">Pictures</a></li>
    <li><a href="/about">About</a></li>
</ul>
<h1>@yield("page-title")</h1>

@yield("page-content")
</body>
</html>
