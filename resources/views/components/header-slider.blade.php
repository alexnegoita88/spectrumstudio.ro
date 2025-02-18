<!-- Hero Section -->

<section class="relative h-50" >
    @if($header_slider)
    <div class="swiper-container header-swiper h-full overflow-hidden" data-effect="{{ $header_slider->effect }}">
        
        <div class="swiper-wrapper">
            @foreach($header_slider->images as $picture)
                <div class="swiper-slide max-h-[510px]">
                    <div style="background-image: url('{{ asset('uploads/' . $picture) }}'); height: 510px;"  class="bg-cover bg-center"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-black opacity-50">
                        
                    </div>
                    <div class="container max-w-6xl mx-auto px-4 h-full flex flex-col justify-center items-start z-40 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <h1 class="py-6 text-6xl text-shadow font-black text-white">{{ $header_slider->h1_title }}</h1>
                        <h2 class="py-4 text-4xl text-shadow font-bold text-white">{{ $header_slider->h2_title }}</h2>
                        <h3 class="py-2 text-2xl text-shadow font-medium text-white">{{ $header_slider->subtitle }}</h3>
                        @if ($header_slider->cta_link)
                        <a href="{{ $header_slider->cta_link }}" class="bg-gray-900 hover:bg-gray-600 text-gray-400 hover:text-gray-200 font-bold py-3 px-8 rounded-xl transition duration-300 w-[200px] text-center">{{ $header_slider->cta_name }}</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination"></div>
    </div>
    @endif
</section>
