@extends('_layouts.app')

@section('title', 'Proiecte')

@section('content')
    

    <header class="container max-w-6xl mx-auto relative py-16 ">
        <!-- Post Thumbnail -->
        <div class="min-h-80">
            <img class="w-full h-auto object-cover border border-gray-500 shadow-lg" src="{{ asset('uploads/' . $post->featured_image) }}" alt="{{ $post->title }}">
        </div>

    </header>

    <section class="container relative max-w-4xl mx-auto p-6 bg-white rounded-md shadow-lg mb-20 -mt-32 md:-mt-40 lg:-mt-60 z-10">

        <article class="space-y-6">
                <!-- Header -->
                <header class="space-y-4">

                    <!-- Title -->
                    <h1 class="text-5xl font-bold text-gray-900 text-center py-8">
                        {{ $post->title }}
                    </h1>

                    <!-- Meta Information -->
                    <div class="flex space-x-4 text-sm text-gray-600">
                        <span>
                            <span class="font-normal">de</span>
                            <a href="{{ route('news_author', urlencode($post->user->name)) }}" class="hover:underline">{{ $post->user->name }}</a>
                        </span>
                        <span>
                            <time datetime="{{ date('d-M-Y H:i', strtotime($post->published_at)) }}">{{ date('d-M-Y H:i', strtotime($post->published_at)) }}</time>
                        </span>
                    </div>
                </header>

                <!-- Content -->
                <div class="space-y-6 text-gray-800 text-pretty px-5 overflow-hidden">
                    {!! $post->body !!}
                </div>
        </article>

    </section>



    
    <section class="relative pb-20 bg-white ">

        <div class="container max-w-6xl mx-auto carousel-container p-6">

            <header class="mb-10">
                <h3 class="font-bold text-4xl">Articole similare</h3>
            </header>

            <div class="carousel-wrapper">
                <!-- Carousel Items -->
                    
                <div class="carousel-inner">
                    @foreach ($similar as $article)
                        <div class="carousel-item">
                            <article class="bg-white">
                                <a href="{{ route('news_show', $article->slug) }}" class="block">
                                    <img src="{{ asset('uploads/' . $article->featured_image) }}" alt="Item 1">
                                </a>
                                <div class="p-6">
                                    <header class="mb-4">
                                        <h2 class="mt-2">
                                            <a href="{{ route('news_show', $article->slug) }}" class="duration-500 text-2xl font-bold hover:text-gray-600">
                                                {{ Str::limit($article->title, 40) }}
                                            </a>
                                        </h2>
                                        <div class="text-sm text-gray-500 mt-2">
                                            <span>de <a href="{{ route('news_author', urlencode($article->user->name)) }}" class="text-gray-700 hover:underline">{{ $article->user->name }}</a></span> |
                                            <time datetime="2024-04-22T15:52:15+03:00">22 aprilie 2024</time>
                                        </div>
                                    </header>
                                    <div class="text-gray-700">
                                        {!! Str::limit($article->excerpt, 120) !!}
                                    </div>
                                    <footer class="mt-4">
                                        <a href="{{ route('news_show', $article->slug) }}" class="uppercase font-bold duration-500 hover:text-gray-600">
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

    @vite('resources/js/carousel.js')
@endsection