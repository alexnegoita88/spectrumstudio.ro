@extends('_layouts.app')

@section('title', 'Acasa')

@section('content')

<x-header-slider />


@if($posts)
<section class="relative pb-20 bg-white ">

    <div class="container max-w-6xl mx-auto carousel-container p-6">

        <header class="mb-10">
            <h2 class="text-4xl font-bold text-center mb-12">Articole recente</h2>
        </header>

        <div class="carousel-wrapper">
            <!-- Carousel Items -->

            <div class="carousel-inner">
                @foreach($posts as $article)
                    <div class="carousel-item">
                        <article class="bg-white">
                            <a href="{{ route('news_show', $article->slug) }}" class="block">
                                <img src="{{ asset('uploads/' . $article->featured_image) }}"
                                    alt="Item 1">
                            </a>
                            <div class="p-6">
                                <header class="mb-4">
                                    <h2 class="mt-2">
                                        <a href="{{ route('news_show', $article->slug) }}"
                                            class="duration-500 text-2xl font-bold hover:text-gray-600">
                                            {{ Str::limit($article->title, 40) }}
                                        </a>
                                    </h2>
                                    <div class="text-sm text-gray-500 mt-2">
                                        <span>de <a
                                                href="{{ route('news_author', urlencode($article->user->name)) }}"
                                                class="text-gray-700 hover:underline">{{ $article->user->name }}</a></span>
                                        |
                                        <time datetime="2024-04-22T15:52:15+03:00">22 aprilie 2024</time>
                                    </div>
                                </header>
                                <div class="text-gray-700">
                                    {!! Str::limit($article->excerpt, 120) !!}
                                </div>
                                <footer class="mt-4">
                                    <a href="{{ route('news_show', $article->slug) }}"
                                        class="uppercase font-bold duration-500 hover:text-gray-600">
                                        Citește mai mult &rarr;
                                    </a>
                                </footer>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Navigation Buttons -->
        <button class="carousel-prev">&#x276E;</button>
        <button class="carousel-next">&#x276F;</button>
    </div>

</section>
@endif


@if($categories)
<!-- Section Wrapper -->
<section class="relative bg-white py-12 border-t ">
    <div class="container max-w-6xl mx-auto px-4">
        <!-- Heading -->
        <h2 class="text-4xl font-bold text-center mb-12">Cele mai noi colectii de produse</h2>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
            <!-- First Column (Full Height) -->

            @foreach ($categories as $category)
                <div class="relative grid ">
                    <img src="{{ asset('uploads/'.$category->featured_picture) }}"
                        alt="Nature mood new" class="object-cover w-full h-full" style="object-position: 50% 100%;">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                        <h2 class="text-3xl font-bold text-white mb-4 text-center">
                            <a
                                href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                        </h2>
                        <a href="{{ route('category', $category->slug) }}"
                            class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">Vezi
                            produsele</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif


<!-- Section Wrapper -->
<section class="relative bg-white w-full h-screen">

    <!-- Row with Two Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 text-center h-1/2">
        <!-- First Column -->
        <div class="bg-white bg-cover bg-center bg-no-repeat"
            style="background-image: url({{ asset(path: 'images/r-evolution_amb_terra-tortora.jpg') }});">
        </div>
        <!-- Second Column -->
        <div class="bg-gray-300 flex flex-col justify-center items-center">
            <h3 class="text-3xl font-bold mb-4">Proiecte</h3>
            <a href="{{ route('projects_all') }}"
                class="duration-300 font-bold bg-gray-800 hover:bg-gray-600 text-gray-300 hover:text-gray-200 rounded-lg p-4">VEZI
                PROIECTELE NOASTRE</a>
        </div>
    </div>

    <!-- Row with Two Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 text-center h-1/2 border-t md:border-t-0">
        <!-- First Column -->
        <div class="bg-gray-300 flex flex-col justify-center items-center">
            <h3 class="text-3xl font-bold mb-4">Conectează-te cu noi</h3>
            <a href="{{ route('contact') }}"
                class="duration-300 font-bold bg-gray-800 hover:bg-gray-600 text-gray-300 hover:text-gray-200 rounded-lg p-4">CONTACTEAZA-NE</a>
        </div>
        <!-- Second Column -->
        <div class="bg-white bg-cover bg-center bg-no-repeat"
        style="background-image: url({{ asset(path: 'images/post6_fimacf.jpg') }});">
        </div>
    </div>

</section>



@endsection
@vite('resources/js/carousel.js')
