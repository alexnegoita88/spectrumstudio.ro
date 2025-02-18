@extends('_layouts.app')

@section('title', 'Acasa')

@section('content')

    <x-header-slider />

    <!-- Section Wrapper -->
    <section class="relative bg-gray-200 py-12">
        <div class="container max-w-6xl mx-auto px-4">
            <!-- Heading -->
            <h2 class="text-4xl font-bold text-center mb-12">Cele mai noi colectii de produse</h2>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:max-h-[630px]">
                <!-- First Column (Full Height) -->
                <div class="relative flex flex-col max-h-[630px] overflow-hidden">
                    <div class="relative flex-1 flex">
                        <img src="{{ asset('uploads/'.$categories[0]->featured_picture) }}"
                            alt="bai studio ceramica"
                            class="object-cover w-full h-full"
                            style="object-position: 26% 81%;">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                            <h2 class="text-3xl font-bold text-white mb-4 text-center">
                                <a href="{{ route('category', $categories[0]->slug) }}" >{{ $categories[0]->name }}</a>
                            </h2>
                            <a href="{{ route('category', $categories[0]->slug) }}" class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                                Vezi produsele
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Second Column (Stacked Elements) -->
                <div class="relative flex flex-col max-h-[630px] overflow-hidden gap-6">
                    <!-- First Element in Second Column -->
                    <div class="relative flex-1 flex h-1/2">
                        <img src="{{ asset('uploads/'.$categories[1]->featured_picture) }}"
                            alt="Nature mood new"
                            class="object-cover w-full h-full"
                            style="object-position: 48% 100%;">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                            <h2 class="text-3xl font-bold text-white mb-4 text-center">
                                <a href="{{ route('category', $categories[1]->slug) }}" >{{ $categories[1]->name }}</a>
                            </h2>
                            <a href="{{ route('category', $categories[1]->slug) }}" class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">Vezi produsele</a>
                        </div>
                    </div>
                    <!-- Second Element in Second Column -->
                    <div class="relative flex-1 flex h-1/2">
                        <img src="{{ asset('uploads/'.$categories[2]->featured_picture) }}"
                            alt="terase2"
                            class="object-cover w-full h-full"
                            style="object-position: 70% 97%;">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                            <h2 class="text-3xl font-bold text-white mb-4 text-center">
                                <a href="{{ route('category', $categories[2]->slug) }}" >{{ $categories[2]->name }}</a>
                            </h2>
                            <a href="{{ route('category', $categories[2]->slug) }}" class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">Vezi produsele</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Section Wrapper -->
    <section class="relative bg-white w-full h-screen">

        <!-- Row with Two Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 text-center h-1/2">
            <!-- First Column -->
            <div class="bg-white bg-cover bg-center bg-no-repeat" style="background-image: url(https://studio-ceramica.ro/wp-content/uploads/2022/10/blog-studio-ceramica.jpg);"></div>
            <!-- Second Column -->
            <div class="bg-gray-300 flex flex-col justify-center items-center">
                <h3 class="text-3xl font-bold mb-4">Proiecte</h3>
                <a href="{{ route('projects_all') }}" class="duration-300 font-bold bg-gray-800 hover:bg-gray-600 text-gray-300 hover:text-gray-200 rounded-lg p-4">VEZI PROIECTELE NOASTRE</a>
            </div>
        </div>

        <!-- Row with Two Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 text-center h-1/2 border-t md:border-t-0">
            <!-- First Column -->
            <div class="bg-gray-300 flex flex-col justify-center items-center">
                <h3 class="text-3xl font-bold mb-4">Conectează-te cu social media</h3>
                <a href="#" class="duration-300 font-bold bg-gray-800 hover:bg-gray-600 text-gray-300 hover:text-gray-200 rounded-lg p-4">FOLLOW ON INSTAGRAM</a>
            </div>
            <!-- Second Column -->
            <div class="bg-white bg-cover bg-center bg-no-repeat" style="background-image: url(https://studio-ceramica.ro/wp-content/uploads/2020/11/studioceramica-design.jpg);"></div>
        </div>

    </section>



@endsection