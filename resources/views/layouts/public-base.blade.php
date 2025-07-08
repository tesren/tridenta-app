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

        @vite(['resources/css/public-app.css'])

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

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MMV5DJHB');</script>
        <!-- End Google Tag Manager -->

        @livewireStyles
    </head>

    <body class="position-relative">

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMV5DJHB"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
       
        @livewire('components.nav-bar')
        
        <main>
            {{ $slot }}
        </main>

        @include('components.footer')

        @if (strpos(Route::currentRouteName(), 'event.form') === false)
            <livewire:whatsapp-btn />
        @endif

        @vite(['resources/js/app.js'])

        @livewireScripts
    </body>

</html>