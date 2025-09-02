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
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => config('captcha.secret'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]
            ]);

            $body = json_decode((string) $response->getBody());
            return $body->success;
        });
    }

    public function register()
    {
        //
    }
}