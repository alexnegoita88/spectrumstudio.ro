<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\FormSubmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }




    public function submit(Request $request)
    {



        // Assume the maximum lengths are dynamic
        $maxNameLength = 255;
        $maxMessageLength = 5000;

        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string|max:5000',
                'terms' => 'accepted',
            ], [
                'required' => 'Camp obligatoriu',
                'string' => 'Caractere alfanumerice',
                'max' => 'Maxim :max caractere',
                'email' => 'Adresa de email invalida',
                'terms' => 'Trebuie sa fi de acord cu termenii si conditiile'
            ]);


            // Create a new FormSubmission record
            $submission = FormSubmission::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'referrer' => $request->path()
            ]);
            
            foreach (User::all() as $user) {
                Mail::send('emails.contact_admin', ['data' => $submission, 'content' => "Un utilizator a completat formularul de contact din site.", 'name' => $user->name], function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('New submission from Contact Form'  );
                });
            }



            Mail::send('emails.contact_client', ['name' => $request->name, 'content' => "Multumim pentru vizita pe site-ul nostru"], function ($message) use ($request) {
                $message->to($request->email)
                    ->subject(env('APP_NAME') . ' - Solicitare in procesare'  );
            });


            return redirect()->route('contact')->with('success', 'Îți mulțumim pentru mesaj! Vom reveni cu un răspuns în curând.');

        } catch (ValidationException $e) {

            return redirect()->route('contact')
                ->withErrors($e->errors())
                ->withInput();

        }
    }

}
