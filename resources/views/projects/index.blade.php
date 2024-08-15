@extends('_layouts.app')

@section('title', 'Proiecte')

@section('content')
    <!-- Section Header -->
    <header class="w-full bg-cover bg-center relative" style="background-image: url({{ asset('images/' . 'Green-Future-Residence-–-COMPLEX-78-Vile-in-Mogosoaia.jpg') }});">
        <!-- Overlay for better text visibility -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-64">
            <h2 class="text-6xl font-bold text-center text-white">Proiecte</h2>
        </div>
    </header>
    
    <div class="container max-w-6xl mx-auto px-4 py-8 mb-8">

        <!-- Section Subheader -->
        <h2 class="mt-8 text-2xl font-semibold text-gray-700 text-center">Proiecte Spectrum Studio</h2>

        <!-- Description -->
        <p class="text-gray-600 text-lg my-8 text-center">
            Cu o activitate de peste 10 ani in Romania, Brandul „<strong>SPECTRUM STUDIO</strong>” furnizeaza un pachet complet de soluții pentru amenajarea proiectelor rezidențiale și proiectelor industriale. SPECTRUM STUDIO, ca importator direct, dispune de toate certificatele de calitate și coformitate pe baza standardelor de referință UNI EN/DIN/ISO pentru toate materiale de finisare.
        </p>

        @if ($projects)
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Gallery Item 1 -->

            @foreach($projects as $project)
                <div class="bg-gray-900  shadow-md overflow-hidden">
                    <img class="w-full h-52 object-cover" src="{{ asset('storage/' . $project->featured_image) }}" alt="BY THE SEA PANORAMIS RESIDENCE MAMAIA NORD">
                    <div class="p-4">
                        <a href="{{ route('products_show', $project->slug) }}">
                            <h3 class="text-lg font-semibold text-gray-200 hover:text-white">{{ $project->title }}</h3>
                        </a>
                    </div>
                </div>
            @endforeach
         
        </div>
        @else
        <div class="grid grid-cols-1 my-16">
            <h3 class="font-bold text-center text-4xl py-2">There are no projects to show...yet...</h3>
            <p class="font-normal text-center text-xl py-1">Please come back later</p>
        </div>
        @endif

    </div>
@endsection