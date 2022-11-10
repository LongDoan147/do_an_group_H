<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '828206951756991',
        'client_secret' => '51e08471e5b5a980d81ca04046dadbb9',
        'redirect' => 'https://repository.local/do_an_group_H/public/callback/facebook'
    ],
    'google' => [
        'client_id' => '872153443222-flgmpsqdshqa8lmsgpl0l5gnqopbrepe.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google'
    ],


];
