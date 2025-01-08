@extends('_layouts.app')

@section('title', 'Căutare')

@section('content')

<header class="w-full bg-cover bg-center relative border-b-2">
    <!-- Overlay for better text visibility -->
    <div class="relative flex items-center justify-center h-32">
        <h2 class="text-4xl font-bold text-center">Căutare dupa "{{ request()->query('query') }}"</h2>
    </div>
</header>

@if($results['products']->isEmpty()  && $results['categories']->isEmpty() && $results['projects']->isEmpty())
    <div class="container max-w-6xl p-6 mx-auto py-6 text-center">
        <p class="text-6xl font-extrabold">Oooops...</p>
        <p class="text-3xl my-10">Nu am găsit nimic</p>
        
        <div class="flex flex-col sm:flex-row justify-center items-center mx-auto w-full mt-10">
            <span class="text-2xl inline-block mb-4 sm:mb-0">Poți încerca o nouă căutare</span>
            <a id="search-icon-alt" href="javascript:void(0);" class="hover:border-gray-500 mx-5 inline-block border rounded-md p-4 border-gray-900 hover:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M18.5 10.5a8 8 0 11-16 0 8 8 0 0116 0z" />
                </svg>
            </a>
        </div>

        <p class="text-2xl my-10">sau</p>

        <a href="{{ route('home') }}" class="mx-auto text-center text-gray-100 font-2xl px-4 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block">Mergi înapoi</a>
    </div>

@else
    <div class="container max-w-6xl p-6 mx-auto py-6">
        {{-- PRODUCTS --}}
        @if(!empty($results['products']) && isset($results['products'][0]))
            <h1 class="text-2xl mt-10 font-bold">Produse:</h1>
            <hr class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(  $results['products'] as $product )
                    <div class="bg-white rounded-sm shadow-sm p-4">
                        <img src="{{ url(asset('uploads/'.$product->pictures[0])) }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded-sm mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ ucfirst($product->name) }}</h3>
                        <a href="{{ route('product', $product->slug) }}"
                            class="w-full text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block my-10">Vezi
                            detalii</a>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- CATEGORIES --}}
        @if(!empty($results['categories']) && isset($results['categories'][0]))
            <h1 class="text-2xl mt-10 font-bold">Categorii:</h1>
            <hr class="mb-8">
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 p-8">

                @foreach(  $results['categories'] as $category )

                    <div class="relative flex flex-col max-h-[630px]">
                        <div class="relative flex-1 flex">
                            <img src="{{ asset('uploads/'.$category->featured_picture) }}" alt="bai studio ceramica"
                                class="object-cover w-full h-full min-h-80" style="object-position: 26% 81%;">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-start justify-end p-4">
                                <a href="{{ route('category', $category->slug) }}"
                                    class="uppercase duration-300 inline-flex items-center w-full px-6 py-3 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700 mb-4">{{ $category->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- PROJECTS --}}
        @if(!empty($results['projects']) && isset($results['projects'][0]))
            <h1 class="text-2xl mt-10 font-bold">Poriecte:</h1>
            <hr class="mb-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- Gallery Item 1 -->

                @foreach($results['projects'] as $project)
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
        @endif
    </div>
@endif


@endsection
