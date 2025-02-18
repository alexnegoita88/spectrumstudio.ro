@extends('_layouts.app')

@section('title', 'Proiecte')

@section('content')
<!-- Section Header -->
<header class="w-full bg-cover bg-center relative"
    style="background-image: url({{ asset('images/post6_fimacf.jpg') }});">
    <!-- Overlay for better text visibility -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-80">
        <h2 class="text-6xl font-bold text-center text-white">Proiecte</h2>
    </div>
</header>

<div class="container max-w-6xl mx-auto px-4 py-8 mb-8">

    <!-- Section Subheader -->
    <h2 class="my-16 text-2xl font-semibold text-gray-700 text-center">Proiecte Spectrum Studio</h2>

    @if($projects)
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Gallery Item 1 -->

            @foreach($projects as $project)
                <div class="bg-gray-900 shadow-md overflow-hidden">
                    @if(!empty($project->pictures) && isset($project->pictures[0]))
                        <img class="w-full h-52 object-cover" src="{{ asset('uploads/' . $project->pictures[0]) }}" alt="{{ $project->title }}">
                    @else
                        <!-- Optional fallback image if no pictures are available -->
                        <img class="w-full h-52 object-cover" src="{{ asset('uploads/default-placeholder.png') }}" alt="{{ $project->title }}">
                    @endif
                    <div class="p-4">
                        <a href="{{ route('projects_show', $project->slug) }}">
                            <h3 class="text-lg font-semibold text-gray-200 hover:text-white uppercase">{{ $project->title }}</h3>
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
