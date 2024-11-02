<header class="bg-gray-100 text-gray-900 shadow-md relative z-20">
    <!-- Logo Row -->
    <div class="container mx-auto px-4 flex justify-center items-center h-52">
        <a href="/" class="text-2xl font-bold">
            <img src="{{ url('/images/Logo_Spectrum.png') }}" alt="Logo SpectrumStudio" class="logo">
        </a>
    </div>

    <!-- Navigation Row -->
    <div class="bg-gray-100 text-gray-900 shadow-md border-t-2">
        <div class="container mx-auto px-4 flex justify-between items-center h-14">
            <!-- Toggle button for mobile menu -->
            <button id="menu-toggle" class="lg:hidden text-gray-900 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Desktop Navigation -->
            <nav id="menu" class="mx-auto lg:flex lg:items-center lg:space-x-6 hidden">
                <ul class="flex space-x-6 h-14 items-center">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-500">Acasa</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-gray-500">Despre Noi</a></li>
                    <li class="relative group"><a href="{{ route('categories_all') }}" class="block px-4 py-2 hover:text-gray-700">Produse</a></li>
                    <li><a href="{{ route('projects_all') }}" class="hover:text-gray-500">Proiecte</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-gray-500">Contact</a></li>
                    <li>
                        <a id="search-icon" href="javascript:void(0);" class="hover:text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M18.5 10.5a8 8 0 11-16 0 8 8 0 0116 0z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Search Popup -->
    <div id="search-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden text-gray-950">
        <div class="bg-white p-6 rounded-lg shadow-lg w-9/12">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold px-4">Caută</h2>
                <button id="close-search-popup" class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="/search" method="GET" class="mt-4 text-center flex justify-between">
                <input type="text" name="query" placeholder="Search..." class="w-3/4 flex-grow p-2 border border-gray-300 focus:outline-none text-gray-950 rounded-l">
                <button type="submit" class="w-1/4 md:w-1/6 bg-gray-600 text-white py-2 rounded-r hover:bg-gray-900">Caută</button>
            </form>
        </div>
    </div>

    <!-- Sidebar for mobile view -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-3/4 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden z-30">
        <div class="flex flex-col h-full">
            <div class="flex-shrink-0 p-4 flex justify-end items-center">
                <button id="sidebar-close" class="text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col flex-grow p-4 text-gray-900">
                <li class="mb-2 py-3 px-4">
                    <button id="search-icon-mobile" class="text-gray-900 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M18.5 10.5a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                        <span class="ml-2">Căutare</span>
                    </button>
                </li>
                <li class="border-t border-gray-300 first:border-t-0">
                    <a href="/" class="block px-4 py-3 hover:text-gray-700">Acasa</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="/about" class="block px-4 py-3 hover:text-gray-700">Despre Noi</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('categories_all') }}" class="block px-4 py-3 hover:text-gray-700">Produse</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('projects_all') }}" class="block px-4 py-3 hover:text-gray-700">Proiecte</a>
                </li>
                <li class="border-t border-gray-300">
                    <a href="{{ route('contact') }}" class="block px-4 py-3 hover:text-gray-700">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</header>
