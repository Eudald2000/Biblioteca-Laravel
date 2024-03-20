<!DOCTYPE html>
<style>
.logo{
    width:10rem;
    height:10rem;
}
.margenL{
    margin-left: 400px
}
.margenPeque{
    margin-left: 150px
}
    </style>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="background-image: url('{{ asset('storage/fondoLogin.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="min-h-screen flex flex-col sm:justify-center items-left pt-6 sm:pt-0 bg-cover bg-center margenL">
            <div class="">
                <a href="/">
                <img src="storage/logo.png" alt="LOGO" class="logo margenPeque" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 transparent shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
