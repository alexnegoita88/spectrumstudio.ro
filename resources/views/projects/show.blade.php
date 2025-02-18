@extends('_layouts.app')

@section('title', 'Proiecte')

@section('description', strip_tags($project->body))
@section('content')


<section class="container relative max-w-6xl mx-auto p-6 bg-white rounded-md shadow-lg my-10 ">

    <header class="w-full bg-cover bg-center relative">
        <div class="relative z-10 flex items-center justify-center ">
            <h1 class="text-6xl font-bold text-center py-6">{{ $project->title }}</h1>
        </div>
    </header>

    <div class="flex flex-col lg:flex-row lg:gap-6 mt-6 border-t py-6">
        <!-- Product Gallery (Left) -->
        <div class="w-full lg:w-1/2 lg:pr-6 relative">
            <!-- Main Swiper Gallery -->
            <div class="swiper-container swiper-container-main">
                <div class="swiper-wrapper">
                    <!-- Main Slides -->
                    @foreach($project->pictures as $picture)
                        <div class="swiper-slide">
                            <img src="{{ url(asset('uploads/'.$picture)) }}" alt="{{ ucfirst($project->title) }}"
                                class="w-full h-full object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
                <!-- Swiper navigation (arrows) -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- Thumbnails Swiper -->
            <div class="swiper-container swiper-container-thumbs mt-4 overflow-x-auto overflow-y-hidden">
                <div class="swiper-wrapper">
                    <!-- Thumbnail Slides -->
                    @foreach($project->pictures as $picture)
                        <div class="swiper-slide">
                            <img src="{{ url(asset('uploads/'.$picture)) }}" alt="{{ ucfirst($project->name) }}"
                                class="thumb-img">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Product Information (Right) -->
        <article class="w-full lg:w-1/2 lg:pl-6">
            <!-- Content -->
            <section class="space-y-6 text-gray-800 text-pretty px-5 py-10 md:px-5 md:py-0 overflow-hidden">
                {!! $project->body !!}
            </section>
        </article>
    </div>

    <!-- Fullscreen Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-70 flex items-center justify-center">
        <div
            class="relative w-11/12 h-11/12 max-w-screen-lg max-h-screen bg-white border-4 border-white overflow-hidden">
            <div class="swiper-container swiper-container-modal h-full w-full">
                <div class="swiper-wrapper h-full w-full">
                    @foreach($project->pictures as $picture)
                        <div class="swiper-slide">
                            <div class="swiper-slide-content">
                                <img src="{{ url(asset('uploads/'.$picture)) }}" alt="Modal Image">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Close Button -->
                <button id="close-modal"
                    class="absolute top-4 right-4 text-gray-800 text-3xl p-2 rounded-full z-50">×</button>
            </div>
        </div>
    </div>


</section>

@endsection
