<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <script>
            const theme = localStorage.getItem('theme') ?? 'dark'
            document.documentElement.className = theme
        </script>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="antialiased bg-gray-100 dark:bg-gray-900 leading-normal tracking-normal">
        {{ $slot }}
        
        @livewire('notifications')

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
