@extends('_layouts.app')

@section('title', 'Categorii')

@section('content')

<section class="container max-w-6xl mx-auto text-center py-28">
    <!-- Change from flex to grid and define columns -->
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 p-8">
        @forelse($categories as $category)
            <div class="w-full flex">
                <!-- Use flex to equalize height -->
                <div
                    class="bg-white shadow-md rounded-lg border border-gray-200 p-4 flex flex-col justify-between w-full">
                    <!-- Make it a flex column -->
                    <a href="{{ route('category', $category->slug) }}"
                        class="block text-center flex-1">
                        <!-- Use flex-1 to allow the link to grow -->
                        <div class="overflow-hidden rounded-full mb-4">
                            <img class="w-full h-full object-cover grayscale transition duration-300 ease-in-out hover:grayscale-0 rounded-full"
                                fetchpriority="high" decoding="async"
                                src="{{ asset('uploads/'.$category->featured_picture) }}"
                                alt="{{ $category->name }}" width="420" height="420">
                        </div>
                        <div class="p-4 text-center">
                            <h4 class="text-lg font-semibold truncate">{{ $category->name }}</h4>
                            <span class="text-blue-500 hover:underline">Vezi produsele</span>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center">
                <p>No categories available.</p>
            </div>
        @endforelse
    </div>

    </div>
</section>





@endsection
