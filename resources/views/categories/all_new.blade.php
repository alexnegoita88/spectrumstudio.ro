@extends('_layouts.app')

@section('title', 'Categorii')

@section('content')

<section class="container max-w-6xl mx-auto text-center py-28">
    <!-- Change from flex to grid and define columns -->
    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 p-8">
        @forelse($categories as $category)



            <!-- First Column (Full Height) -->
            <div class="relative flex flex-col max-h-[630px]">
                <div class="relative flex-1 flex">
                    <img src="{{ Storage::url($category->featured_picture) }}" alt="bai studio ceramica"
                        class="object-cover w-full h-full" style="object-position: 26% 81%;">
                    <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-start justify-end p-4">
                        <a href="/products/store"
                            class="uppercase duration-300 inline-flex items-center w-full px-6 py-3 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700 mb-4">
                            {{ $category->name }}
                        </a>
                    </div>
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
