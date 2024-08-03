@extends('layouts.app')

@section('title', 'Acasă')

@section('content')


    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-50" style="background-image: url('https://studio-ceramica.ro/wp-content/uploads/2022/10/policroma-studio-ceramica.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-4 py-32 relative z-10 flex flex-col text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Bine ați venit la SpectrumStudio</h1>
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold mb-4">Colecția Noastră Unică</h2>
            <p class="text-lg md:text-xl lg:text-2xl mb-8">Descoperiți arta ceramicii prin colecțiile noastre rafinate, create cu măiestrie și pasiune.</p>
            <a href="/products" class="bg-gray-900 hover:bg-gray-600 text-gray-400 hover:text-gray-200 font-bold py-3 px-8 rounded-xl transition duration-300 w-[200px] text-center">Vezi Produsele</a>
        </div>
    </section>

<!-- Section Wrapper -->
<section class="relative bg-gray-200 py-12">
    <div class="container max-w-6xl mx-auto px-4">
        <!-- Heading -->
        <h2 class="text-4xl font-bold text-center mb-12">Cele mai noi colectii de ceramica</h2>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-h-[630px]">
            <!-- First Column (Full Height) -->
            <div class="relative flex flex-col max-h-[630px] overflow-hidden">
                <div class="relative flex-1 flex">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/bai-studio-ceramica.jpg"
                        alt="bai studio ceramica"
                        class="object-cover w-full h-full"
                        style="object-position: 26% 81%;">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                        <h2 class="text-3xl font-bold text-white mb-4 text-center">
                            <a href="/products/store" >Bai</a>
                        </h2>
                        <a href="/products/store" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                            Caută online
                        </a>
                    </div>
                </div>
            </div>

            <!-- Second Column (Stacked Elements) -->
            <div class="relative flex flex-col max-h-[630px] overflow-hidden gap-6">
                <!-- First Element in Second Column -->
                <div class="relative flex-1 flex h-1/2">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/Nature-mood-new.jpg"
                        alt="Nature mood new"
                        class="object-cover w-full h-full"
                        style="object-position: 48% 100%;">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                        <h2 class="text-3xl font-bold text-white mb-4 text-center">
                            <a href="/products/store" >Living & Dormitor</a>
                        </h2>
                        <a href="/products/store" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                            Caută online
                        </a>
                    </div>
                </div>
                <!-- Second Element in Second Column -->
                <div class="relative flex-1 flex h-1/2">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/terase2.jpg"
                        alt="terase2"
                        class="object-cover w-full h-full"
                        style="object-position: 70% 97%;">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                        <h2 class="text-3xl font-bold text-white mb-4 text-center">
                            <a href="/products/store" >Terase</a>
                        </h2>
                        <a href="/products/store" class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                            Caută online
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection
