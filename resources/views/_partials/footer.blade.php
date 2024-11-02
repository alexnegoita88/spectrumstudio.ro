<footer class="bg-gray-900 text-white py-6">
    <section class="bg-gray-900 py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-center space-y-8 md:space-y-0 md:space-x-8">
                <!-- Section 1 -->
                <div class="flex-1 text-center text-4xl font-bold mx-auto">
                    <a href="{{ route('home') }}">
                        <img src="{{ url('/images/Logo_Spectrum.png') }}" alt="Logo SpectrumStudio" class="logo">
                    </a>
                </div>

                <!-- Section 2 -->
                <div class="flex-1 text-center">
                    <p class="text-white">
                        Ca importator direct, dispunem de toate certificatele de calitate și conformitate pe baza standardelor de referință UNI EN/DIN/ISO pentru toate materialele de finisare.
                    </p>
                    <p class="border-t-2 border-gray-700 mt-4 py-2">
                        <ul>
                            <li><a href="">Termeni si conditii</a></li>
                            <li><a href="">Politica de confidentialitate</a></li>
                            <li><a href="">Politica cookie</a></li>
                        </ul>
                    </p>
                </div>

                <!-- Section 3 -->
                <div class="flex-1 text-center">
                    <h2 class="text-white text-xl font-bold mb-4">Social</h2>
                    <div class="flex justify-center space-x-4">
                        <a 
                            href="https://www.facebook.com/" 
                            aria-label="Facebook" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="text-white hover:text-gray-400 transition-colors"
                        >
                            <!-- Facebook Icon -->
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M17 3v2h-2c-0.552 0-1.053 0.225-1.414 0.586s-0.586 0.862-0.586 1.414v3c0 0.552 0.448 1 1 1h2.719l-0.5 2h-2.219c-0.552 0-1 0.448-1 1v7h-2v-7c0-0.552-0.448-1-1-1h-2v-2h2c0.552 0 1-0.448 1-1v-3c0-1.105 0.447-2.103 1.172-2.828s1.723-1.172 2.828-1.172zM18 1h-3c-1.657 0-3.158 0.673-4.243 1.757s-1.757 2.586-1.757 4.243v2h-2c-0.552 0-1 0.448-1 1v4c0 0.552 0.448 1 1 1h2v7c0 0.552 0.448 1 1 1h4c0.552 0 1-0.448 1-1v-7h2c0.466 0 0.858-0.319 0.97-0.757l1-4c0.134-0.536-0.192-1.079-0.728-1.213-0.083-0.021-0.167-0.031-0.242-0.030h-3v-2h3c0.552 0 1-0.448 1-1v-4c0-0.552-0.448-1-1-1z"/>
                            </svg>
                        </a>
                        <a 
                            href="https://www.instagram.com/" 
                            aria-label="Instagram" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="text-white hover:text-gray-400 transition-colors"
                        >
                            <!-- Instagram Icon -->
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M7 1c-1.657 0-3.158 0.673-4.243 1.757s-1.757 2.586-1.757 4.243v10c0 1.657 0.673 3.158 1.757 4.243s2.586 1.757 4.243 1.757h10c1.657 0 3.158-0.673 4.243-1.757s1.757-2.586 1.757-4.243v-10c0-1.657-0.673-3.158-1.757-4.243s-2.586-1.757-4.243-1.757zM7 3h10c1.105 0 2.103 0.447 2.828 1.172s1.172 1.723 1.172 2.828v10c0 1.105-0.447 2.103-1.172 2.828s-1.723 1.172-2.828 1.172h-10c-1.105 0-2.103-0.447-2.828-1.172s-1.172-1.723-1.172-2.828v-10c0-1.105 0.447-2.103 1.172-2.828s1.723-1.172 2.828-1.172zM16.989 11.223c-0.15-0.972-0.571-1.857-1.194-2.567-0.754-0.861-1.804-1.465-3.009-1.644-0.464-0.074-0.97-0.077-1.477-0.002-1.366 0.202-2.521 0.941-3.282 1.967s-1.133 2.347-0.93 3.712 0.941 2.521 1.967 3.282 2.347 1.133 3.712 0.93 2.521-0.941 3.282-1.967 1.133-2.347 0.93-3.712zM15.011 11.517c0.122 0.82-0.1 1.609-0.558 2.227s-1.15 1.059-1.969 1.18-1.609-0.1-2.227-0.558-1.059-1.15-1.18-1.969 0.1-1.609 0.558-2.227 1.15-1.059 1.969-1.18c0.313-0.046 0.615-0.042 0.87-0.002 0.74 0.11 1.366 0.47 1.818 0.986 0.375 0.428 0.63 0.963 0.72 1.543zM17.5 7.5c0.552 0 1-0.448 1-1s-0.448-1-1-1-1 0.448-1 1 0.448 1 1 1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container mx-auto text-center border-t-2 border-gray-700 py-4">
        <p>&copy; {{ date('Y') }} SpectrumStudio. Toate drepturile rezervate.</p>
    </section>
</footer>
