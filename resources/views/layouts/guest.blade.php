<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Tores Escaro Funeral Services </title>

         <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <x-header/>
        <div class="min-h-screen bg-gray-50 flex flex-col sm:justify-start items-center pt-6 sm:pt-0 dark:bg-gray-900">
            <div class="w-full px-6 py-4 dark:bg-gray-800 overflow-hidden">
                {{ $slot }}
            </div>
        </div>
        <x-footer />
        <x-flash-messages />
    </body>
</html>
