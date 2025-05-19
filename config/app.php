<?php

return [

    // App Name
    'name' => env('APP_NAME', 'Laravel'),

    // App Environment
    'env' => env('APP_ENV', 'production'),

    // Debug Mode
    'debug' => (bool) env('APP_DEBUG', false),

    // URL
    'url' => env('APP_URL', 'http://localhost'),

    // Timezone
    'timezone' => 'UTC',

    // Locale Config
    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    // Encryption Key
    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    // Providers
    'providers' => [
        Illuminate\Auth\AuthServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ],

    // Maintenance Mode Driver
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];