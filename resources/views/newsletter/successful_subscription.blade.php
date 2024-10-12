@extends('_layouts.app')

@section('title', 'Newsletter Subscribe')

@section('content')

<section class="container max-w-6xl p-6 mx-auto">
    <div class="flex flex-col items-center my-16">
        <!-- Check if already subscribed -->
        @if(session('already_subscribed'))
            <div class="mt-6">
                <h1 class="text-2xl font-semibold">You're Already Subscribed!</h1>
                <p class="mt-4">It looks like you're already subscribed with that email
                    <!-- <strong>{{ session('email') }}</strong>.</p> -->
                <p class="mt-4">Would you like to unsubscribe? Enter your email below to proceed:</p>

                <!-- Unsubscribe form -->
                <form action="{{ route('newsletter_unsubscribe') }}" method="GET" class="mt-6">
                    @csrf
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Your Email:</label>
                    <input type="email" id="email" name="email" class="border rounded-md p-2 w-full max-w-xs" required>

                    <button type="submit"
                        class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600">
                        Unsubscribe
                    </button>
                </form>
            </div>

            <!-- If user successfully resubscribes -->
        @elseif(session('resubscribed'))
            <div class="mt-6">
                <h1 class="text-2xl font-semibold">Welcome Back!</h1>
                <p class="mt-4">{{ session('resubscribed') }}</p>
            </div>

            <!-- If successful subscription -->
        @elseif(session('success'))
            <div class="mt-6">
                <h1 class="text-2xl font-semibold">Subscription Successful!</h1>
                <p class="mt-4">Thank you for subscribing to our newsletter. You'll receive updates in your inbox soon.
                </p>
            </div>

        @endif

        <!-- Display error message if unsubscribing failed -->
        @if(session('error'))
            <div class="mt-6">
                <h1 class="text-2xl font-semibold text-red-600">Unsubscribe Failed!</h1>
                <p class="mt-4 text-red-500">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Link back to the home page -->
        <div class="mt-40">
            <a href="{{ route('home') }}"
                class="px-4 py-2 bg-gray-700 text-white rounded-md shadow-sm hover:bg-gray-600">
                Go to Homepage
            </a>
        </div>
    </div>
</section>

@endsection
