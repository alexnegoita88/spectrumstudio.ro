@extends('_layouts.app')

@section('title', 'Noutati')

@section('content')

    <!-- Section Header -->
    <header class="w-full bg-cover bg-center relative" style="background-image: url({{ asset('images/' . 'noutati-studio-ceramica.jpg') }});">
        <!-- Overlay for better text visibility -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-80">
            <h2 class="text-6xl font-bold text-center text-white">Noutati</h2>
        </div>
    </header>


    <section class="container max-w-6xl mx-auto py-16">

        @if($news)
        <div id="archive-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">

            @foreach ($news as $post)
            
                <article class="bg-white shadow-md overflow-hidden border">
                    <a href="{{ route('news_show', $post->slug) }}" class="block">
                        <img src="{{ asset('storage/'. $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
                    </a>
                    <div class="p-6">
                        <header class="mb-4">
                            <h2 class="mt-2">
                                <a href="{{ route('news_show', $post->slug) }}" class="duration-500 text-2xl font-bold hover:text-gray-600">
                                    Pereti si pardoseli din gresie portelanata made in FLORIM
                                </a>
                            </h2>
                            <div class="text-sm text-gray-500 mt-2">
                                <span>de <a href="{{ route('news_author', urlencode($post->user->name)) }}" class="text-gray-700 hover:underline">{{ $post->user->name }}</a></span> |
                                <time datetime="2024-04-22T15:52:15+03:00">22 aprilie 2024</time>
                            </div>
                        </header>
                        <div class="text-gray-700">
                            <p>Indicii de istorie a ceramicii Italia a dat foarte mult sectorului ceramicii, atât în ​​faza de creație artistică, cât și în procesele industriale...</p>
                        </div>
                        <footer class="mt-4 ">
                            <a href="{{ route('news_show', $post->slug) }}" class="uppercase font-bold duration-500 hover:text-gray-600">
                                Citește mai mult &rarr;
                            </a>
                        </footer>
                    </div>
                </article>
                
            @endforeach

        </div>
        @else
        <div class="grid grid-cols-1 my-16">
            <h3 class="font-bold text-center text-4xl py-2">There are no posts to show...yet...</h3>
            <p class="font-normal text-center text-xl py-1">Please come back later</p>
        </div>
        @endif

    </section>

@endsection