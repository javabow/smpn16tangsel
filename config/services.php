<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'google' => [
       'client_id' => '514938702616-m7da8j1972be982ceo61rkv2c93ktvgq.apps.googleusercontent.com', //Google API
       'client_secret' => 'M88vzk-9wf5Cb_Izwy6DIXAR', //Google Secret
       'redirect' => 'https://iparkir.id/login/google/callback',
    ],

    'github' => [
       'client_id' => 'b151fbf0a5f1d9319bba',
       'client_secret' => 'fca7a26056de11f2bc84fc3df1549105a24308ac',
       'redirect' => 'https://iparkir.id/login/github/callback',
    ],

    'facebook' => [
       'client_id' => '1319837574839329',
       'client_secret' => 'f71720e07d4336da3e8251917eac7feb',
       'redirect' => 'https://iparkir.id/login/facebook/callback',
    ],


    // 'instagram' => [
    //    'client_id' => 'eab77b8a7c5341599fba4a41b877298c',
    //    'client_secret' => '306acbd2dd2541ceab2fca84b461cd0a',
    //    'redirect' => 'http://127.0.0.1:8000/login/instagram/callback',
    // ],
];
