@extends('_layouts.app')

@section('title', 'Acasa')

@section('content')


    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-50" style="background-image: url('https://studio-ceramica.ro/wp-content/uploads/2022/10/policroma-studio-ceramica.jpg');">
        <div class="max-w-6xl mx-auto">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="container mx-auto px-4 py-32 relative z-10 flex flex-col text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">Bine ați venit la SpectrumStudio</h1>
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold mb-4">Colecția Noastră Unică</h2>
                <p class="text-lg md:text-xl lg:text-2xl mb-8">Descoperiți arta ceramicii prin colecțiile noastre rafinate, create cu măiestrie și pasiune.</p>
                <a href="/products" class="bg-gray-900 hover:bg-gray-600 text-gray-400 hover:text-gray-200 font-bold py-3 px-8 rounded-xl transition duration-300 w-[200px] text-center">Vezi Produsele</a>
            </div>
        </div>
    </section>

    <!-- Section Wrapper -->
    <section class="relative bg-gray-200 py-12">
        <div class="container max-w-6xl mx-auto px-4">
            <!-- Heading -->
            <h2 class="text-4xl font-bold text-center mb-12">Cele mai noi colectii de ceramica</h2>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-h-[630px]">
                <!-- First Column (Full Height) -->
                <div class="relative flex flex-col max-h-[630px] overflow-hidden">
                    <div class="relative flex-1 flex">
                        <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/bai-studio-ceramica.jpg"
                            alt="bai studio ceramica"
                            class="object-cover w-full h-full"
                            style="object-position: 26% 81%;">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                            <h2 class="text-3xl font-bold text-white mb-4 text-center">
                                <a href="/products/store" >Bai</a>
                            </h2>
                            <a href="/products/store" class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                                Caută online
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Second Column (Stacked Elements) -->
                <div class="relative flex flex-col max-h-[630px] overflow-hidden gap-6">
                    <!-- First Element in Second Column -->
                    <div class="relative flex-1 flex h-1/2">
                        <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/Nature-mood-new.jpg"
                            alt="Nature mood new"
                            class="object-cover w-full h-full"
                            style="object-position: 48% 100%;">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                            <h2 class="text-3xl font-bold text-white mb-4 text-center">
                                <a href="/products/store" >Living & Dormitor</a>
                            </h2>
                            <a href="/products/store" class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                                Caută online
                            </a>
                        </div>
                    </div>
                    <!-- Second Element in Second Column -->
                    <div class="relative flex-1 flex h-1/2">
                        <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/terase2.jpg"
                            alt="terase2"
                            class="object-cover w-full h-full"
                            style="object-position: 70% 97%;">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-center justify-center p-4">
                            <h2 class="text-3xl font-bold text-white mb-4 text-center">
                                <a href="/products/store" >Terase</a>
                            </h2>
                            <a href="/products/store" class="duration-300 inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gray-800 border border-transparent rounded-lg shadow-sm hover:bg-gray-700">
                                Caută online
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Section Wrapper -->
    <section class="relative bg-white w-full h-screen">

        <!-- Row with Two Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 text-center h-1/2">
            <!-- First Column -->
            <div class="bg-white bg-cover bg-center bg-no-repeat" style="background-image: url(https://studio-ceramica.ro/wp-content/uploads/2022/10/blog-studio-ceramica.jpg);"></div>
            <!-- Second Column -->
            <div class="bg-gray-300 flex flex-col justify-center items-center">
                <h3 class="text-3xl font-bold mb-4">De pe blog</h3>
                <a href="#" class="duration-300 font-bold bg-gray-800 hover:bg-gray-600 text-gray-300 hover:text-gray-200 rounded-lg p-4">VIZITEAZĂ BLOGUL</a>
            </div>
        </div>

        <!-- Row with Two Columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 text-center h-1/2 border-t md:border-t-0">
            <!-- First Column -->
            <div class="bg-gray-300 flex flex-col justify-center items-center">
                <h3 class="text-3xl font-bold mb-4">Conectează-te cu social media</h3>
                <a href="#" class="duration-300 font-bold bg-gray-800 hover:bg-gray-600 text-gray-300 hover:text-gray-200 rounded-lg p-4">FOLLOW ON INSTAGRAM</a>
            </div>
            <!-- Second Column -->
            <div class="bg-white bg-cover bg-center bg-no-repeat" style="background-image: url(https://studio-ceramica.ro/wp-content/uploads/2020/11/studioceramica-design.jpg);"></div>
        </div>

    </section>




    <!-- Section Wrapper -->
    <section class="relative bg-white w-full py-12">
        <div class="container max-w-6xl mx-auto px-4">

            <!-- Heading -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold">Colecții de SpectrumStudio</h2>
            </div>

            <!-- Row Layout with Five Columns -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

                <!-- First Column -->
                <div class="flex justify-center items-center">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/luxury-desing.png" alt="luxury design" class="h-14 w-auto">
                </div>

                <!-- Second Column -->
                <div class="flex justify-center items-center">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/creative-design.png" alt="creative design" class="h-14 w-auto">
                </div>

                <!-- Third Column -->
                <div class="flex justify-center items-center">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/contemporany-design.png" alt="contemporary design" class="h-14 w-auto">
                </div>

                <!-- Fourth Column -->
                <div class="flex justify-center items-center">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/arhitectural-design.png" alt="architectural design" class="h-14 w-auto">
                </div>

                <!-- Fifth Column -->
                <div class="flex justify-center items-center">
                    <img src="https://studio-ceramica.ro/wp-content/uploads/2022/10/vintage-design.png" alt="vintage design" class="h-14 w-auto">
                </div>

            </div>
        </div>

    </section>



    <!-- Full Width Section Wrapper -->
    <section class="relative bg-cover bg-center h-[500px] parallax-bg" style="background-image: url('https://studio-ceramica.ro/wp-content/uploads/2020/11/acasa-studio-subscriber.jpg');">
        <div class="absolute inset-0 bg-opacity-50 bg-gray-900"></div>
        <div class="relative container mx-auto h-full flex items-center justify-center py-12">
            <div class="flex flex-col items-center">
                <h2 class="text-4xl font-bold text-white text-center mb-4">Creat pentru tine</h2>
                <p class="text-lg font-bold mb-6 text-white text-shadow-md">
                    Inscrie-te să primești noutăți și ai 10 % reducere la următoarea comandă.
                </p>
                <form class="w-full max-w-md flex items-center space-x-4" action="" method="post">
                    <div class="flex-1">
                        <input name="email" id="email" type="email" placeholder="Completează e-mail-ul tău aici" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <div>
                        <button type="submit" class="duration-300 px-6 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-600">
                            Abonare
                        </button>
                    </div>
                </form>
                <noscript>
                    <div class="text-red-500 mt-4">Please enable JavaScript in your browser to submit the form</div>
                    <style>.kb-submit-field { display: none; }</style>
                </noscript>
            </div>
        </div>
    </section>

@endsection