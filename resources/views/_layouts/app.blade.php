<!-- resources/views/_layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Spectrum Studio - Importator direct de materiale de finisare de înaltă calitate.">
    <meta name="author" content="Spectrum Studio">

    @if(env('APP_ENV') == 'local')
    <meta name="robots" content="noindex, nofollow">
    {{-- to change attribute to 'index, follow' --}}
    @endif
    
    <title>@yield('title', 'SpectrumStudio')</title>

    <!-- Favicon for various browsers -->
    <link rel="icon" href="{{ url('images/Logo_spectrum.ico') }}" type="image/x-icon">

    <!-- For modern browsers (PNG format) -->
    <link rel="icon" href="{{ url('images/Logo_spectrum.png') }}" type="image/png">
    <!-- Apple touch icon for iOS devices -->
    <link rel="apple-touch-icon" href="{{ url('images/Logo_spectrum.png') }}">
    <!-- Android Chrome icon -->
    <link rel="icon" sizes="192x192" href="{{ url('images/Logo_spectrum.png') }}">
    <link rel="icon" sizes="512x512" href="{{ url('images/Logo_spectrum.png') }}">



    <!-- Open Graph for Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:title" content="@yield('title', 'SpectrumStudio')">
    <meta property="og:description" content="@yield('description', 'Spectrum Studio - Importator direct de materiale de finisare de înaltă calitate.')">
    <meta property="og:image" content="{{ url('images/Logo_spectrum.png') }}">

    <!-- Twitter Card Data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ Request::fullUrl() }}">
    <meta name="twitter:title" content="@yield('title', 'SpectrumStudio')">
    <meta name="twitter:description" content="@yield('description', 'Spectrum Studio - Importator direct de materiale de finisare de înaltă calitate.')">
    <meta name="twitter:image" content="{{ url('images/Logo_spectrum.png') }}">

    @php
        use App\Services\SeoService;

        // Set a default description if none is provided in the view
        $defaultDescription = 'Spectrum Studio - Importator direct de materiale de finisare de înaltă calitate.';
        $description = trim(strip_tags(view()->yieldContent('description'))) ?: $defaultDescription;
    @endphp

    <meta name="keywords" content="{{ SeoService::generateKeywords($description, 40) }}">

    <!-- Geo Tags (For local SEO, if relevant) -->
    <meta name="geo.region" content="Ro" />
    <meta name="geo.placename" content="Bucharest, RO" />

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "{{ env('APP_URL', 'www.spectrumstudio.ro') }}",
            "logo": "{{ url('images/Logo_spectrum.png') }}",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+40-0700XXXXXX",
                "contactType": "Customer Service",
                "areaServed": "RO",
                "availableLanguage": "Romanian"
            }
        }

    </script>


    @vite('resources/css/app.css')
    
    <!-- Google reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.sitekey') }}"></script>

</head>

<body class="bg-gray-100">
    {{--
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
    --}}
    @include('_partials.header')


    <!-- Navigation Row -->
    <div class="bg-white text-gray-900 shadow-md border-t sticky top-0 z-20">
        <div class=" mx-auto px-4 flex items-center h-14">
            <!-- Toggle button for mobile menu -->
            <button id="menu-toggle" class="lg:hidden text-gray-900 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Desktop Navigation -->
            <nav id="menu" class="mx-auto lg:flex lg:items-center lg:space-x-6 hidden">
                <ul class="flex space-x-6 h-14 items-center">
                    <li>
                        <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'font-bold' : '' }} hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">Acasa</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="{{ Route::is('about') ? 'font-bold' : '' }} hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">Despre Noi</a>
                    </li>
                    <li>
                        <a href="{{ route('categories_all') }}" class="{{ Route::is('categories_all') ? 'font-bold' : '' }} hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">Produse</a>
                    </li>
                    <li>
                        <a href="{{ route('projects_all') }}" class="{{ Route::is('projects_all') ? 'font-bold' : '' }} hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">Proiecte</a>
                    </li>
                    <li>
                        <a href="{{ route('news_all') }}" class="{{ Route::is('news_all') ? 'font-bold' : '' }} hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">Noutati</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'font-bold' : '' }} hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">Contact</a>
                    </li>
                    <li>
                        <a id="search-icon" href="javascript:void(0);" class="hover:text-gray-900 hover:font-bold transition-all duration-100 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M18.5 10.5a8 8 0 11-16 0 8 8 0 0116 0z" />
                            </svg>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>

    <!-- Search Popup -->
    <div id="search-popup"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden text-gray-950 z-20">
        <div class="bg-white p-6 rounded-lg shadow-lg w-9/12">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold px-4">Caută</h2>
                <button id="close-search-popup" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="/search" method="GET" class="mt-4 text-center flex justify-between">
                <input type="text" name="query" placeholder="Search..." required minlength="3"
                    class="w-3/4 flex-grow p-2 border border-gray-300 focus:outline-none text-gray-900 rounded-l">
                <button type="submit"
                    class="w-1/4 md:w-1/6 bg-gray-600 text-white py-2 rounded-r hover:bg-gray-900">Caută</button>
            </form>
        </div>
    </div>

    <!-- Sidebar for mobile view -->
    <div id="sidebar"
        class="fixed inset-y-0 left-0 w-3/4 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden z-30">
        <div class="flex flex-col h-full">
            <div class="flex-shrink-0 p-4 flex justify-end items-center">
                <button id="sidebar-close" class="text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col flex-grow p-4 text-gray-900">
                <li class="mb-2 py-3 px-4">
                    <button id="search-icon-mobile" class="text-gray-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M18.5 10.5a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                        <span class="ml-2">Căutare</span>
                    </button>
                </li>
                <li class="hidden" id="search-input-container">
                    <form action="/search" class="flex items-center my-4">
                        <input type="text" name="query" placeholder="Search..." required minlength="3"
                            class="w-3/4 flex-grow p-2 border border-gray-300 focus:outline-none text-gray-950 rounded-l">
                        <button type="submit"
                            class="w-1/4 md:w-1/6 bg-gray-600 text-white py-2 rounded-r hover:bg-gray-900">Caută</button>
                    </form>
                </li>
                <li class="border-t border-gray-300 first:border-t-0">
                    <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'font-bold' : '' }} block px-4 py-3 hover:text-gray-700">Acasa</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('about') }}" class="{{ Route::is('about') ? 'font-bold' : '' }} block px-4 py-3 hover:text-gray-700">Despre Noi</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('categories_all') }}" class="{{ Route::is('categories_all') ? 'font-bold' : '' }} block px-4 py-3 hover:text-gray-700">Produse</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('projects_all') }}" class="{{ Route::is('projects_all') ? 'font-bold' : '' }} block px-4 py-3 hover:text-gray-700">Proiecte</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('news_all') }}" class="{{ Route::is('news_all') ? 'font-bold' : '' }} block px-4 py-3 hover:text-gray-700">Noutati</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'font-bold' : '' }} block px-4 py-3 hover:text-gray-700">Contact</a>
                </li>
            </ul>
        </div>
    </div>


    <main>
        @if(session('success'))
            <div class="container max-w-6xl mx-auto my-5 py-3 bg-green-100 border border-green-400 text-green-700 px-4 rounded relative"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.415l-2.933 3.434a1 1 0 11-1.415-1.415l3.433-2.933-3.433-2.933a1 1 0 011.415-1.415L10 8.586l3.433-3.434a1 1 0 011.415 1.415L11.415 10l3.434 3.433a1 1 0 010 1.416z" />
                    </svg>
                </span>
            </div>
        @endif
        @if(session('error'))
            <div class="container max-w-6xl mx-auto my-5 py-3 bg-red-100 border border-red-400 text-red-700 px-4 rounded relative"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1 1 0 01-1.415 0L10 11.415l-2.933 3.434a1 1 0 11-1.415-1.415l3.433-2.933-3.433-2.933a1 1 0 011.415-1.415L10 8.586l3.433-3.434a1 1 0 011.415 1.415L11.415 10l3.434 3.433a1 1 0 010 1.416z" />
                    </svg>
                </span>
            </div>
        @endif


        @yield('content')
    </main>

    @include('_partials.footer')

    @vite('resources/js/app.js')

    @include('cookie-consent::index')

</body>

</html>
