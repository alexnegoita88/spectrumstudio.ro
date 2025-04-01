@extends('_layouts.app')

@section('title', 'Despre noi')

@section('content')

    <!-- About Section -->
    <section class="py-12">
        <div class="container max-w-6xl mx-auto px-4 py-12">
            <h2 class="text-4xl font-bold mb-10 text-center">Despre Noi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 shadow rounded">
                    <img src="{{ asset('images/Iulia.jpg') }}" alt="">
                </div>
                <div class="bg-white p-6 shadow rounded flex items-center flex-col justify-center">
                    <h3 class="text-3xl font-semibold mb-4">Fondator</h3>
                    <p>
                        Sunt Iulia Andreea Bulea, fondator Spectrum Studio SRL - o companie dedicata amenajarilor interioare pentru spatii rezidentiale si comerciale.  
                    </p>
                    <p>
                        Cu o diploma in scenografie si o experienta de 17 ani in domeniul vanzarilor de amenajari interioare, aduc o perspectiva artistica si tehnica in fiecare proiect. Sunt pasionata de design si colaborez cu o echipa de arhitecti pentru a transforma viziunea clientilor in realitate.
                    </p>

                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section class="parallax-bg  justify-center text-center text-white" style="background-image: url({{ asset('images/r-evolution_amb_terra-tortora.jpg') }})">
        <div class="bg-black bg-opacity-50 py-40 rounded-lg">
            <h2 class="text-4xl font-bold mb-4">Comunicăm online</h2>
            <p class="text-lg mb-8">Discover our amazing features and services.</p>
            <a href="{{ route('contact') }}" class="duration-300 px-4 py-2 text-2xl tracking-widest font-medium uppercase rounded-lg shadow-sm text-white bg-gray-700 hover:bg-gray-800 border border-transparent">Contact</a>
        </div>
    </section>


@endsection