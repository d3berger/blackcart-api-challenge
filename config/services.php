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

    'shopify' => [
        'url' => env('SHOPIFY_REST_ADMIN_API_URL'),
        'password' => env('SHOPIFY_REST_ADMIN_API_PASSWORD'),
    ],

    'woocommerce' => [
        'url' => env('WOOCOMMERCE_REST_API_URL'),
        'consumer_key' => env('WOOCOMMERCE_REST_API_CONSUMER_KEY'),
        'consumer_secret' => env('WOOCOMMERCE_REST_API_CONSUMER_SECRET'),
        'version' => env('WOOCOMMERCE_REST_API_VERSION'),
    ]

];
