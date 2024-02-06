<?php

use Illuminate\Support\Str;

return [

    'driver' => env('SESSION_DRIVER', 'file'),

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    'encrypt' => false,

    'files' => storage_path('framework/sessions'),

    'connection' => env('SESSION_CONNECTION'),

    'table' => 'sessions',

    'store' => env('SESSION_STORE'),

    'lottery' => [2, 100],

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    'path' => '/',

    // Assicurati di sostituire '.yourdomain.com' con il tuo dominio effettivo,
    // mantenendo il punto iniziale per condividere i cookie tra tutti i sottodomini.
    'domain' => env('SESSION_DOMAIN', '.betagardenhouse.dnsabr.com'),

    // Imposta 'secure' su true per forzare l'uso dei cookie solamente su connessioni sicure (HTTPS).
    'secure' => env('SESSION_SECURE_COOKIE', true),

    'http_only' => true,

    // 'same_site' impostato su 'none' permette l'invio dei cookie in contesti cross-site,
    // necessario se il frontend e il backend sono su domini diversi.
    'same_site' => 'none',

    'partitioned' => false,
];

