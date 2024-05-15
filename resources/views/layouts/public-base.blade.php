<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        @yield('titles')

        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/public-styles.css') }}">

        {{-- Favicon --}}
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/img/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href={{ asset("/img/favicon/apple-icon-60x60.png")}}>
        <link rel="apple-touch-icon" sizes="72x72" href={{ asset("/img/favicon/apple-icon-72x72.png")}}>
        <link rel="apple-touch-icon" sizes="76x76" href={{ asset("/img/favicon/apple-icon-76x76.png")}}>
        <link rel="apple-touch-icon" sizes="114x114" href={{ asset("/img/favicon/apple-icon-114x114.png")}}>
        <link rel="apple-touch-icon" sizes="120x120" href={{ asset("/img/favicon/apple-icon-120x120.png")}}>
        <link rel="apple-touch-icon" sizes="144x144" href={{ asset("/img/favicon/apple-icon-144x144.png")}}>
        <link rel="apple-touch-icon" sizes="152x152" href={{ asset("/img/favicon/apple-icon-152x152.png")}}>
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href={{ asset("/img/favicon/android-icon-192x192.png")}}>
        <link rel="icon" type="image/png" sizes="32x32" href={{ asset("/img/favicon/favicon-32x32.png")}}>
        <link rel="icon" type="image/png" sizes="96x96" href={{ asset("/img/favicon/favicon-96x96.png")}}>
        <link rel="icon" type="image/png" sizes="16x16" href={{ asset("/img/favicon/favicon-16x16.png")}}>
        <link rel="manifest" href={{ asset("/img/favicon/manifest.json")}}>
        <meta name="msapplication-TileColor" content="#1275BA">
        <meta name="msapplication-TileImage" content={{ asset("/img/favicon/ms-icon-144x144.png")}}>
        <meta name="theme-color" content="#1275BA">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>
       
        @livewire('components.nav-bar')
        
        <main>
            {{ $slot }}
        </main>

        @include('components.footer')

        @vite(['resources/js/app.js'])

    </body>

</html>