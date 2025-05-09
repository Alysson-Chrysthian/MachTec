<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite('resources/css/app.css')
        @stack('styles')

        <title>{{ $title ?? 'MachTec' }}</title>
    </head>
    
    <body>
        {{ $slot }}

        <footer>
            MachTec 2025 &copy;
        </footer>

        @vite('resources/js/app.js')
        @stack('scripts')
    </body>

</html>
