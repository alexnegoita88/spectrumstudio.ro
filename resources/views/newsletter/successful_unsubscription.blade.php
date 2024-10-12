@extends('_layouts.app')

@section('title', 'Unsubscription Successful')

@section('content')

<section class="container max-w-6xl p-6 mx-auto">
    <div class="flex flex-col items-center my-16">
        <!-- Display success message from session (if available) -->
        @if(session('success'))
            <div class="mt-6">
                <h1 class="text-2xl font-semibold">Unsubscription Successful!</h1>
                <p class="mt-4">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Display error message if any -->
        @if(session('error'))
            <div class="mt-6">
                <h1 class="text-2xl font-semibold text-red-500">Unsubscription Failed!</h1>
                <p class="mt-4">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Link back to the home page -->
        <div class="mt-6">
            <a href="{{ route('home') }}" class="px-4 py-2 bg-gray-700 text-white rounded-md shadow-sm hover:bg-gray-600">
                Go to Homepage
            </a>
        </div>
    </div>
</section>

@endsection
