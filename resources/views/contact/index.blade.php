@extends('_layouts.app')

@section('title', 'Contact')

@section('content')
    


    <!-- Section Header -->
    <header class="w-full bg-cover bg-center relative" style="background-image: url({{ asset('images/r-evolution_amb_terra-tortora.jpg') }});">
        <!-- Overlay for better text visibility -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-80">
            <h2 class="text-6xl font-bold text-center text-white">Contact</h2>
        </div>
    </header>



    <section class="container max-w-6xl p-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-4 my-16">
            <!-- Left Card -->
            <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
                <div class="bg-gray-900 hover:bg-gray-700 duration-300 text-gray-300 rounded-lg shadow-lg p-8 text-center">
                    <div class="flex items-center justify-center mb-6">
                        <svg style="display:inline-block;vertical-align:middle" viewBox="0 0 24 24" height="50" width="50" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    </div>
                    <h2 class="text-lg md:text-xl lg:text-2xl font-bold mb-4">
                        <a href="mailto:contact@spectrumstudio.ro">contact@spectrumstudio.ro</a>
                    </h2>
                </div>
            </div>

            <!-- Right Card -->
            <div class="w-full md:w-1/2 px-4">
                <div class="bg-gray-900 hover:bg-gray-700 duration-300 text-gray-300 rounded-lg shadow-lg p-8 text-center">
                    <div class="flex items-center justify-center mb-6">
                        <svg style="display:inline-block;vertical-align:middle" viewBox="0 0 24 24" height="50" width="50" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <h2 class="text-lg md:text-xl lg:text-2xl font-bold mb-4">
                        <a href="tel:+4074xXXXXXX">0734774615</a>
                    </h2>
                </div>
            </div>
        </div>
    </section>




    <section class="border-t">
        <div class="container max-w-6xl p-6 mx-auto">

            <h1 class="text-4xl mx-auto text-center font-bold pt-10 pb-2 my-6">Contactează-ne</h1>

            <hr class="my-6">

            
            <div class="container pb-10 pt-4">
                <form id="SpectrumStudioContactForm" action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <!-- Name and Email Fields Inline -->
                    <div class="flex gap-4 mb-4">
                        <!-- Name Field -->
                        <div class="w-1/2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nume*</label>
                            <input type="text" name="name" id="name" class="mt-1 h-9 p-2 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('name') }}" >
                            <span class="text-red-500 text-sm error-message" id="nameError"></span>
                        </div>

                        <!-- Email Field -->
                        <div class="w-1/2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
                            <input type="email" name="email" id="email" class="mt-1 h-9 p-2 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('email') }}" >
                            <span class="text-red-500 text-sm error-message" id="emailError"></span>
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Mesaj*</label>
                        <textarea name="message" id="message" rows="5" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm" >{{ old('message') }}</textarea>
                        <span class="text-red-500 text-sm error-message" id="messageError"></span>
                    </div>

                    <!-- Terms and Conditions Checkbox -->
                    <div class="mb-4">
                        <label for="terms" class="inline-flex items-center">
                            <input type="checkbox" name="terms" id="terms" class="rounded-md border-gray-300 shadow-sm" {{ old('terms') ? 'checked' : '' }} >
                            <span class="ml-2 text-sm text-gray-700">Am citit si sunt de acord cu <a href="{{ route('terms') }}" class="text-blue-600 underline hover:text-blue-800">Termeni si conditiile</a></span>
                        </label>
                        <span class="text-red-500 text-sm error-message" id="termsError"></span>
                    </div>

                    <!-- reCAPTCHA v3 (hidden field) -->
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="mb-4">
                            <span class="text-red-500 text-sm">{{ $errors->first('g-recaptcha-response') }}</span>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" id="submit-btn" class="px-4 py-2 bg-gray-700 text-white rounded-md shadow-sm hover:bg-gray-600 disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors duration-200">
                            <span id="button-text">Trimite</span>
                            <span id="loading-spinner" class="hidden">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Se trimite...
                            </span>
                        </button>
                    </div>
                </form>
                @vite('resources/js/contact_validation.js')

                <!-- reCAPTCHA v3 Script -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.getElementById('SpectrumStudioContactForm');
                        const submitBtn = document.getElementById('submit-btn');
                        const buttonText = document.getElementById('button-text');
                        const loadingSpinner = document.getElementById('loading-spinner');
                        let isSubmitting = false;
                        
                        // Funcție pentru a activa loading state
                        function setLoadingState() {
                            if (isSubmitting) return; // Previne multiple activări
                            
                            isSubmitting = true;
                            submitBtn.disabled = true;
                            buttonText.classList.add('hidden');
                            loadingSpinner.classList.remove('hidden');
                        }
                        
                        // Funcție pentru a dezactiva loading state (în caz de eroare)
                        function resetLoadingState() {
                            isSubmitting = false;
                            submitBtn.disabled = false;
                            buttonText.classList.remove('hidden');
                            loadingSpinner.classList.add('hidden');
                        }
                        
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();
                            
                            // Previne multiple submit-uri
                            if (isSubmitting) {
                                return false;
                            }
                            
                            // Verifică validitatea formularului
                            if (!form.checkValidity()) {
                                form.reportValidity();
                                return false;
                            }
                            
                            // Activează loading state
                            setLoadingState();
                            
                            grecaptcha.ready(function() {
                                grecaptcha.execute('{{ config('captcha.sitekey') }}', {action: 'contact_form'}).then(function(token) {
                                    document.getElementById('g-recaptcha-response').value = token;
                                    
                                    // Submit-ul se face după un mic delay pentru a se vedea loading-ul
                                    setTimeout(function() {
                                        form.submit();
                                    }, 100);
                                }).catch(function(error) {
                                    console.error('reCAPTCHA error:', error);
                                    resetLoadingState();
                                    alert('A apărut o eroare cu reCAPTCHA. Te rugăm să încerci din nou.');
                                });
                            });
                        });
                        
                        // Reset loading state dacă utilizatorul navighează înapoi
                        window.addEventListener('pageshow', function(event) {
                            if (event.persisted) {
                                resetLoadingState();
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </section>

@endsection
