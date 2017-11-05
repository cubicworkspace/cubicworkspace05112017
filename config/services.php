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
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '667129853491146',
        'client_secret' => '30a56448accfaa78aabe614af2c577c7',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    // 'google' => [
    //     'client_id' => '194014164638-bglgolke09teqqnhg80jn4672a74gjsj.apps.googleusercontent.com',
    //     'client_secret' => 'FfeUZld5M41Di6icUfgl-aCS',
    //     'redirect' => 'http://localhost:8000/auth/google/callback',
    // ],
    'google' => [
        'client_id' => '194014164638-02qve6hjohnosj10ilo5tfcju02nq4lq.apps.googleusercontent.com',
        'client_secret' => 'jJBUTgTVdKhD6KnvFgsrkSNj',
        'redirect' => 'http://workshare.id/auth/google/callback',
    ],

];
