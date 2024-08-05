<!-- resources/views/_layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Spectrum Studio - Importator direct de materiale de finisare de înaltă calitate.">

    <title>@yield('title', 'SpectrumStudio')</title>
    

    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">

    @include('_partials.header')

    <main>
        @yield('content')
    </main>

    @include('_partials.footer')

    @vite('resources/js/app.js')
    
</body>

</html>
