@extends('_layouts.app')

@section('title', 'Categorii')

@section('content')

<section class="container max-w-6xl mx-auto text-center py-28">
    <!-- Change from flex to grid and define columns -->
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
        @forelse($categories as $category)
            <div class="max-w-xs">
                <div class="bg-white shadow-md rounded-lg border border-gray-200 p-4">
                    <a href="{{ route('category', $category->slug) }}" class="block text-center">
                        <!-- Container for the image with padding -->
                        <div class="overflow-hidden rounded-full">
                            <img class="w-full h-full object-cover grayscale transition duration-300 ease-in-out hover:grayscale-0 rounded-full"
                                fetchpriority="high" decoding="async"
                                src="{{ Storage::url($category->featured_picture) }}"
                                alt="accesorii baie" width="420" height="420"
                                >
                        </div>
                        <div class="p-4">
                            <h4 class="text-lg font-semibold truncate" style="max-width: 150px;">{{ $category->name }}</h4>
                            <span class="text-blue-500 hover:underline">Vezi produsele</span>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <!-- You can add a message or placeholder here if there are no categories -->
            <div class="col-span-full">
                <p>No categories available.</p>
            </div>
        @endforelse
    </div>
</section>





@endsection
