<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class CaptchaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('captcha', function ($attribute, $value, $parameters, $validator) {
            if (empty($value)) {
                return false;
            }

            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => config('captcha.secret'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]
            ]);

            $body = json_decode((string) $response->getBody());
            
            // Pentru reCAPTCHA v3, verificăm success și scorul
            if (!$body->success) {
                return false;
            }
            
            // Verificăm scorul (0.5 este un prag rezonabil)
            $threshold = 0.5;
            return isset($body->score) && $body->score >= $threshold;
        });
    }

    public function register()
    {
        //
    }
}