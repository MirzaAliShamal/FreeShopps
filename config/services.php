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

    'firebase' => [
        'api_key' => 'AIzaSyB1LrVTNJBaEXEzM-RSBzdxif3amKaebiY"',
        'auth_domain' => 'freeshopps-3a888.firebaseapp.com',
        'database_url' => 'https://freeshopps-3a888-default-rtdb.firebaseio.com/',
        'secret' => 'RdoqXkPMHYUd0Ocm1LFkPZAlHTtlahUUJcp71Ai5',
        'storage_bucket' => 'freeshopps-3a888.appspot.com',
        'project_id' => 'freeshopps-3a888',
        'messaging_sender_id' => '832326338339'
    ],

    'google' => [
        'client_id' => '47334395090-8qp9ab9aqoqtvgdstndhtr80mu7fiai6.apps.googleusercontent.com',
        'client_secret' => 'm13zqxN07cD2uf541uoVNhmk',
        'redirect' => 'http://127.0.0.1:8000/social-login/google/callback',
    ],
    'facebook' => [
        'client_id'     => '1271446329969414',
        'client_secret' => '051b3d879a62f22270640890d2cc617f',
        'redirect'      => 'https://freeshopps.com/social-login/facebook/callback',
    ],

];
