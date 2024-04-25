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
        <link rel="stylesheet" href="{{ asset('/css/admin-v3.css') }}">

        @include('components.favicon')

    </head>

    <body>
       
        @include('components.mobile-nav')
        
        <div class="row justify-content-center justify-content-lg-end" style="min-height: 100vh;">

            <div class="col-1 col-lg-2 px-0 fixed-top d-none d-lg-block" style="height: 100vh;">
                @include('components.sidebar')
            </div>

            <div class="col-12 col-lg-10 p-0">
                @yield('content')

                @include('components.admin-footer')
            </div>

        </div>

        @vite(['resources/js/app.js'])

    </body>

</html>