@extends('_layouts.app')

@section('title', 'Proiecte')

@section('content')

    <section class="container relative max-w-6xl mx-auto p-6 bg-white rounded-md shadow-lg my-10 ">
        
        <header class="w-full bg-cover bg-center relative mb-10" style="background-image: url({{ asset('storage/' . $project->featured_image) }});">
            <!-- Overlay for better text visibility -->
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative z-10 flex items-center justify-center h-80">
                <h1 class="text-6xl font-bold text-center text-white">{{ $project->title }}</h1>
            </div>
        </header>

        <article class="space-y-6">
            <!-- Content -->
            <div class="space-y-6 text-gray-800 text-pretty px-5 overflow-hidden">
                {!! $project->body !!}
            </div>
        </article>

    </section>

@endsection