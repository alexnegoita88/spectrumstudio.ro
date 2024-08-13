@extends('_layouts.app')

@section('title', 'Despre noi')

@section('content')

    <!-- About Section -->
    <section class="py-12">
        <div class="container max-w-6xl mx-auto px-4 py-12">
            <h2 class="text-4xl font-bold mb-10 text-center">Despre Noi</h2>
            <p class="text-lg mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <p class="text-lg mb-6">
                Nulla facilisi cras fermentum odio eu feugiat pretium. Nunc sed augue lacus viverra vitae congue eu consequat. Volutpat lacus laoreet non curabitur gravida arcu ac. Mauris nunc congue nisi vitae suscipit tellus mauris a.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold mb-4">Our Mission</h3>
                    <p>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-xl font-semibold mb-4">Our Vision</h3>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-12 bg-gray-300">

        <div class="container max-w-8xl mx-auto px-4 py-12">
            <h2 class="text-4xl font-bold mb-10 text-center">Meet Our Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 shadow rounded text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">John Doe</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="bg-white p-6 shadow rounded text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Jane Smith</h3>
                    <p>Creative Director</p>
                </div>
                <div class="bg-white p-6 shadow rounded text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Alice Johnson</h3>
                    <p>Lead Designer</p>
                </div>
            </div>
        </div>
        
    </section>

    <!-- Contact Section -->
    <section class="parallax-bg  justify-center text-center text-white" style="background-image: url('https://studio-ceramica.ro/wp-content/uploads/2020/11/contact-studioceramica-3.jpg')">
        <div class="bg-black bg-opacity-50 py-40 rounded-lg">
            <h2 class="text-4xl font-bold mb-4">Comunicăm online</h2>
            <p class="text-lg mb-8">Discover our amazing features and services.</p>
            <a href="{{ route('contact') }}" class="duration-300 px-4 py-2 text-4xl font-bold uppercase rounded-lg shadow-sm text-white bg-gray-700 hover:bg-gray-800 border border-transparent">Contact</a>
        </div>
    </section>


@endsection