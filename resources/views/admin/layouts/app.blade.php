<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <head>
{{--    O que tiver com o @section('header') e renderizado aqui    --}}
        @yield('header')
    </head>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        #default Footer
    </footer>
</body>
</html>
