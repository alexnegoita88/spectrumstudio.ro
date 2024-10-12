@extends('_layouts.app')

@section('title', 'Confirm Unsubscription')

@section('content')

<section class="container max-w-6xl p-6 mx-auto">
    <div class="flex flex-col items-center my-16">
        <h1 class="text-2xl font-semibold">Confirm Unsubscription</h1>
        <p class="mt-4">Are you sure you want to unsubscribe from our newsletter?</p>
        <p class="mt-4">You are currently subscribed with the email: <strong>{{ session('email') }}</strong></p>

        <form action="{{ route('newsletter_unsubscribe') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600">
                Yes, Unsubscribe Me
            </button>
        </form>

        <div class="mt-4">
            <a href="{{ route('home') }}" class="px-4 py-2 bg-gray-700 text-white rounded-md shadow-sm hover:bg-gray-600">
                No, Go Back
            </a>
        </div>
    </div>
</section>

@endsection
