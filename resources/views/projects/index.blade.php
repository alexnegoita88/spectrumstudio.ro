@extends('_layouts.app')

@section('title', 'Proiecte')

@section('content')
<!-- Section Header -->
<header class="w-full bg-cover bg-center relative"
    style="background-image: url({{ asset('images/' . 'Green-Future-Residence-–-COMPLEX-78-Vile-in-Mogosoaia.jpg') }});">
    <!-- Overlay for better text visibility -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-80">
        <h2 class="text-6xl font-bold text-center text-white">Proiecte</h2>
    </div>
</header>

<div class="container max-w-6xl mx-auto px-4 py-8 mb-8">

    <!-- Section Subheader -->
    <h2 class="my-16 text-2xl font-semibold text-gray-700 text-center">Proiecte Spectrum Studio</h2>

    @if(!empty($projects[0]))
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Gallery Item 1 -->

            @foreach($projects as $project)
                <div class="bg-gray-900 shadow-md overflow-hidden">
                    @if(!empty($project->pictures) && isset($project->pictures[0]))
                        <img class="w-full h-52 object-cover"
                            src="{{ asset('storage/' . $project->pictures[0]) }}"
                            alt="{{ $project->title }}">
                    @else
                        <!-- Optional fallback image if no pictures are available -->
                        <img class="w-full h-52 object-cover"
                            src="{{ asset('storage/default-placeholder.png') }}"
                            alt="{{ $project->title }}">
                    @endif
                    <div class="p-4">
                        <a href="{{ route('projects_show', $project->slug) }}">
                            <h3 class="text-lg font-semibold text-gray-200 hover:text-white uppercase">
                                {{ $project->title }}</h3>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <div class="col-span-full text-center">
            <h4 class="text-2xl font-bold">Ooops..</h4>
            <p class="text-center my-10">Nu am gasit prodiecte...</p>
            <a href="{{ route('home') }}" class="mx-auto text-center text-gray-100 font-2xl px-4 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block">Mergi înapoi</a>
        </div>

    @endif

</div>
@endsection