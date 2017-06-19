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
    
    'paypal' => [
	    'client_id' => 'AWuZE23jYYD-JeAKuuO9i-an5EHovoCyLh24ZkBI-Kuj6oHrscg1nEN5xQsslcEhuTRAF8B1hkbObgif',
	    'secret' => 'EFOjDkLRZQ0OlcyR3CavSF2T0a1-xtpcBupH9dqg70F-hkeqOEu9-swj1vYicw7ia9pCX3_P_XIGkuFk'
    ],
];
