<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield ('ttitle') </title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    {{-- @vite(['resources/sass/app.scss']) --}}
</head>
<body>
    @include('layouts.partials.nav')

    <main class="page">

    @yield('content')
    </main>

    @include('layouts.partials.footer')

</body>
</html>
