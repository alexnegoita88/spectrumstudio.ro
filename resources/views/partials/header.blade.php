<header class="bg-black text-white shadow-md relative z-20 ">
    <div class="container mx-auto px-4 flex justify-between items-center h-14">
        <a href="/" class="text-2xl font-bold">Studio Ceramica</a>
        <!-- Toggle button for mobile menu -->
        <button id="menu-toggle" class="lg:hidden text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <nav id="menu" class="lg:flex lg:items-center lg:space-x-6 hidden">
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-gray-400">Acasa</a></li>
                <li><a href="/about" class="hover:text-gray-400">Despre Noi</a></li>
                <li class="relative group">
                    <button class="w-full text-center block hover:text-gray-400">Produse</button>
                    <ul class="absolute left-0 hidden w-48 bg-black border border-gray-800 rounded-md shadow-lg group-hover:block">
                        <li class="group relative px-0 py-2 mx-0 border-t border-gray-800 first:border-t-0">
                            <a href="/products/all" class="block px-4 py-2 hover:text-gray-300">Toate produsele</a>
                        </li>
                        <li class="group relative px-0 py-2 mx-0 border-t border-gray-800">
                            <a href="/products/store" class="block px-4 py-2 hover:text-gray-300">Magazin</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/design" class="hover:text-gray-400">Design & Arhitecti</a></li>
                <li><a href="/projects" class="hover:text-gray-400">Proiecte</a></li>
                <li><a href="/news" class="hover:text-gray-400">Noutati</a></li>
                <li><a href="/contact" class="hover:text-gray-400">Contact</a></li>
                <li>
                    <a href="/search" class="hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M18.5 10.5a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Sidebar for mobile view -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-3/4 bg-black shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out lg:hidden z-30">
        <div class="flex flex-col h-full">
            <div class="flex-shrink-0 p-4">
                <button id="sidebar-close" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <ul class="flex flex-col flex-grow p-4 ">
                <li class="border-t border-gray-800 first:border-t-0">
                    <a href="/" class="block px-4 py-3 hover:text-gray-400">Acasa</a>
                </li>
                <li class="border-t border-gray-800">
                    <a href="/about" class="block px-4 py-3 hover:text-gray-400">Despre Noi</a>
                </li>
                <li class="border-t border-gray-800">
                    <button class="w-full text-left block px-4 py-3 hover:text-gray-400">Produse</button>
                    <ul class="ml-10 flex flex-col ">
                        <li class="border-t border-gray-800 ">
                            <a href="/products/all" class="block px-4 py-3 hover:text-gray-400">Toate produsele</a>
                        </li>
                        <li class="border-t border-gray-800">
                            <a href="/products/store" class="block px-4 py-3 hover:text-gray-400">Magazin</a>
                        </li>
                    </ul>
                </li>
                <li class="border-t border-gray-800">
                    <a href="/design" class="block px-4 py-3 hover:text-gray-400">Design &amp; Arhitecti</a>
                </li>
                <li class="border-t border-gray-800">
                    <a href="/projects" class="block px-4 py-3 hover:text-gray-400">Proiecte</a>
                </li>
                <li class="border-t border-gray-800">
                    <a href="/news" class="block px-4 py-3 hover:text-gray-400">Noutati</a>
                </li>
                <li class="border-t border-gray-800">
                    <a href="/contact" class="block px-4 py-3 hover:text-gray-400">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</header>