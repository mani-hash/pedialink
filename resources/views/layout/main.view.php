<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/app.css">
    @yield('css')
</head>
<body>
    @yield('content')
    @yield('scripts')
    <c-toast :initToasts="flash('_message') ?? null"></c-toast>
</body>
</html>
