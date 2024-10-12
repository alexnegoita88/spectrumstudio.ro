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
            dump("END DATE:" . $endDate->format('d-M-Y'));
        }
    @endphp

    @include('_partials.header')

    <main>
        @if(session('success'))
            <div class="container max-w-6xl mx-auto my-5 py-3 bg-green-100 border border-green-400 text-green-700 px-4 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.415l-2.933 3.434a1 1 0 11-1.415-1.415l3.433-2.933-3.433-2.933a1 1 0 011.415-1.415L10 8.586l3.433-3.434a1 1 0 011.415 1.415L11.415 10l3.434 3.433a1 1 0 010 1.416z"/></svg>
                </span>
            </div>
        @endif

        @yield('content')
    </main>

    @include('_partials.footer')

    @vite('resources/js/app.js')
    
</body>

</html>
