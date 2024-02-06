<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;


return [



    'name' => env('APP_NAME', 'Laravel'),



    'env' => env('APP_ENV', 'production'),




    'debug' => (bool) env('APP_DEBUG', true),



    'url' => env('APP_URL', 'https://betagardenhouse.dnsabr.com'),

    'asset_url' => env('ASSET_URL'),



    'timezone' => 'UTC',

 

    'locale' => 'it',



    'fallback_locale' => 'it',



    'faker_locale' => 'en_US',



    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',


    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],



    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        Spatie\Permission\PermissionServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),


    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
