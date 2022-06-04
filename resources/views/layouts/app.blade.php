<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Diamontis, restaurant de burger">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body class="">

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>