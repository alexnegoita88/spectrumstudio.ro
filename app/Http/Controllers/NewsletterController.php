<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request) {
        // Validate the email field and reCAPTCHA
        $request->validate([
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'email.required' => 'Adresa de email este obligatorie',
            'email.email' => 'Adresa de email nu este validă',
            'g-recaptcha-response.required' => 'Te rugăm să completezi reCAPTCHA',
            'g-recaptcha-response.captcha' => 'Verificarea reCAPTCHA a eșuat',
        ]);

        // Check if the email exists in the database
        $existingSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if ($existingSubscriber) {
            // If already subscribed with 'active' set to 1, show the "already subscribed" message
            if ($existingSubscriber->active == 1) {
                return redirect()->route('successful_subscription')->with([
                    'already_subscribed' => true,
                    'email' => $request->email,
                ]);
            }

            // If the email exists but has 'active' set to 0, update it to 1 (resubscribe)
            $existingSubscriber->update(['active' => 1]);

            return redirect()->route('successful_subscription')->with([
                'success' => 'You have successfully resubscribed to the newsletter!',
            ]);
        }

        // If no existing record, create a new subscription with 'active' set to 1
        NewsletterSubscriber::create([
            'email' => $request->email,
            'active' => 1, // New subscriber is set as active
        ]);

        // Redirect with success message
        return redirect()->route('successful_subscription')->with([
            'success' => 'You have successfully subscribed to the newsletter!',
        ]);
    }

    public function successful_subscribe() {
        // Render the view for successful subscription
        return view('newsletter.successful_subscription');
    }

    public function unsubscribe(Request $request) {
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Find the subscriber by email
        $subscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if ($subscriber) {
            // Update the 'active' field to 0 (unsubscribed)
            $subscriber->update(['active' => 0]);

            return redirect()->route('successful_unsubscription')->with('success', 'You have successfully unsubscribed.');
        }

        return redirect()->route('successful_unsubscription')->with('error', 'Email not found in our subscription list.');
    }

    public function successful_unsubscribe() {
        // Render the view for successful unsubscription
        return view('newsletter.successful_unsubscription');
    }
}
