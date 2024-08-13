@extends('_layouts.app')

@section('title', 'Proiecte')

@section('content')
    <!-- Section Header -->
    <header class="w-full bg-cover bg-center relative" style="background-image: url('https://studio-ceramica.ro/wp-content/uploads/2021/02/Green-Future-Residence-–-COMPLEX-78-Vile-in-Mogosoaia.jpg');">
        <!-- Overlay for better text visibility -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-64">
            <h2 class="text-6xl font-bold text-center text-white">Proiecte</h2>
        </div>
    </header>
    
    <div class="container max-w-6xl mx-auto px-4 py-8">


        <!-- Spacer -->
        <div class="my-8"></div>

        <!-- Section Subheader -->
        <h2 class="text-2xl font-semibold text-gray-700 text-center">Proiecte Spectrum Studio</h2>

        <!-- Description -->
        <p class="text-gray-600 text-lg mt-4 text-center">
            Cu o activitate de peste 10 ani in Romania, Brandul „<strong>SPECTRUM STUDIO</strong>” furnizeaza un pachet complet de soluții pentru amenajarea proiectelor rezidențiale și proiectelor industriale. STUDIO CERAMICA, ca importator direct, dispune de toate certificatele de calitate și coformitate pe baza standardelor de referință UNI EN/DIN/ISO pentru toate materiale de finisare.
        </p>

        <!-- Spacer -->
        <div class="my-8"></div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Gallery Item 1 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/BY-THE-SEA-PANORAMIS-RESIDENCE-MAMAIA-NORD-1024x520.jpg" alt="BY THE SEA PANORAMIS RESIDENCE MAMAIA NORD">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">BY THE SEA – PANORAMIS</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 2 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/CEZ-CRAIOVA.jpg" alt="CEZ CRAIOVA">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">CEZ Craiova</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 3 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/CEZ-PITESTI.jpg" alt="CEZ PITESTI">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">CEZ PITESTI</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 4 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/MALL-VIVO-CLUJ-NAPOCA.jpg" alt="MALL VIVO CLUJ NAPOCA">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">MALL VIVO CLUJ</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 5 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/PROMENADA-PANORAMIS-RESIDENCE-MAMAIA-NORD-1024x520.jpg" alt="PROMENADA PANORAMIS RESIDENCE MAMAIA NORD">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">PROMENADA – PANORAMIS</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 6 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/DECEBAL-TOWER-SEDIUL-AUTOVIT.jpg" alt="DECEBAL TOWER SEDIUL AUTOVIT">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">DECEBAL TOWER</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 7 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/Green-Future-Residence-–-COMPLEX-78-Vile-in-Mogosoaia.jpg" alt="Green Future Residence">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">Green Future Residence</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 8 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/MALL-MERCUR-CENTER-CRAIOVA.jpg" alt="MALL MERCUR CENTER CRAIOVA">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">MALL MERCUR CENTER</h3>
                    </a>
                </div>
            </div>
            <!-- Gallery Item 9 -->
            <div class="bg-gray-900  shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="https://studio-ceramica.ro/wp-content/uploads/2021/02/NAUTIC-SPORT-CLUB-HOTEL-NAVODARI-1024x682.jpg" alt="NAUTIC SPORT CLUB HOTEL NAVODARI">
                <div class="p-4">
                    <a href="#">
                        <h3 class="text-lg font-semibold text-gray-200 hover:text-white">hotel NAUTIC SPORT CLUB</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection