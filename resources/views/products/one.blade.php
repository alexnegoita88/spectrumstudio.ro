@extends('_layouts.app')

@section('title', ucfirst($product->name))

@section('description', strip_tags($product->description))

@section('content')

<section class="container max-w-6xl mx-auto p-6">

    <!-- Product Banner -->
    <div class="relative">
        <img src="{{ asset('uploads/'.$product->pictures[0]) }}" alt="{{ ucfirst($product->name) }}"
            class="w-full h-80 object-cover rounded-lg">
    </div>

    <!-- Product Details -->
    <div class="flex flex-col lg:flex-row lg:gap-6 mt-6">
        <!-- Product Gallery (Left) -->
        <div class="w-full lg:w-1/2 lg:pr-6 relative">
            <!-- Main Swiper Gallery -->
            <div class="swiper-container swiper-container-main">
                <div class="swiper-wrapper">
                    <!-- Main Slides -->
                    @foreach($product->pictures as $picture)
                        <div class="swiper-slide">
                            <img src="{{ asset('uploads/'.$picture) }}" alt="{{ ucfirst($product->name) }}"
                                class="w-full h-full object-cover rounded-lg">
                        </div>
                    @endforeach
                </div>
                <!-- Swiper navigation (arrows) -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <!-- Thumbnails Swiper -->
            <div class="swiper-container swiper-container-thumbs mt-4">
                <div class="swiper-wrapper">
                    <!-- Thumbnail Slides -->
                    @foreach($product->pictures as $picture)
                        <div class="swiper-slide">
                            <img src="{{ asset('uploads/'.$picture) }}" alt="{{ ucfirst($product->name) }}"
                                class="thumb-img">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>




        <!-- Product Information (Right) -->
        <div class="w-full lg:w-1/2 lg:pl-6">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ ucfirst($product->name) }}</h1>


            <div class="text-lg text-gray-600 my-14">{!! $product->description !!}</div>

            @if($product->external_link)
                <a href="{{ url($product->external_link) }}" target="_blank"
                    class="text-center text-gray-100 font-2xl px-4 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block">Vezi
                    mai multe detalii...</a>
            @endif

            @if(isset($product->catalogs) && !empty($product->catalogs[0]))
                <ul class="space-y-2 mt-16">
                    <h3 class="font-bold text-xl underline">Vezi @if( sizeof($product->catalogs) > 1)
                        {{ "cataloagele:" }} @else {{ "catalogul:" }} @endif
                    </h3>
                    @foreach($product->catalogs as $catalog)
                        <li class="flex ">
                            <a href="{{ asset('uploads/'.$catalog) }}" target="_blank" class="text-lg inline-block  transform hover:scale-105 transition-transform duration-200 ease-in-out hover:underline">
                                {{ basename($catalog) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>

    <!-- Related Products (Optional) -->
    @if($relatedProducts->isNotEmpty())
        <section class="mt-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Related Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-sm shadow-sm p-4">
                        <img src="{{ asset('uploads/'.$relatedProduct->pictures[0]) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover rounded-sm mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ ucfirst($relatedProduct->name) }}</h3>
                        <a href="{{ route('product', $relatedProduct->slug) }}" class="w-full text-center text-gray-100 font-2xl px-2 py-2 bg-gray-900 hover:bg-gray-600 rounded-lg inline-block my-10">Vezi detalii</a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Fullscreen Modal -->
    <div id="modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-70 flex items-center justify-center">
        <div
            class="relative w-11/12 h-11/12 max-w-screen-lg max-h-screen bg-white border-4 border-white overflow-hidden">
            <div class="swiper-container swiper-container-modal h-full w-full">
                <div class="swiper-wrapper h-full w-full">
                    @foreach($product->pictures as $picture)
                        <div class="swiper-slide">
                            <div class="swiper-slide-content">
                                <img src="{{ asset('uploads/'.$picture) }}" alt="Modal Image">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Close Button -->
                <button id="close-modal" class="absolute top-4 right-4 text-gray-800 text-3xl p-2 rounded-full z-50">×</button>
            </div>
        </div>
    </div>

</section>

@endsection
