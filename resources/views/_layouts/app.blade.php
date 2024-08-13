<!-- resources/views/_layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Spectrum Studio - Importator direct de materiale de finisare de înaltă calitate.">

    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', 'SpectrumStudio')</title>
    

    @vite('resources/css/app.css')

</head>
<body class="bg-gray-100">

    @php
        
        $signDate = new DateTime("2024-07-26");

        $currentDate = new DateTime('now');

        $endDate = $signDate->add(new DateInterval('P45D'));


        $theDiff = $endDate->diff($currentDate);

        if (env('APP_ENV') == 'local' && env('APP_DEBUG') == true) {
            // dump($signDate->format('d-M-Y'),$currentDate->format('d-M-Y'), $endDate->format('d-M-Y'));
            dump("TIME LEFT UNTILL DEPLOYMENT:", $theDiff);
        }

    @endphp

    @include('_partials.header')

    <main>
        @yield('content')
    </main>

    @include('_partials.footer')

    @vite('resources/js/app.js')
    
</body>

</html>
