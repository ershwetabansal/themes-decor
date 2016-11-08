<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Theme & Decor</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ elixir('css/red.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @stack('styles_scripts')
</head>
<body>
    @include('app.header')

    @include('app.head_section')

    @include('app.navigation')

    @yield('content')

    <!-- Scripts -->
    <script src="{{ elixir('js/app.js') }}"></script>
    @stack('body_scripts')
</body>
</html>
