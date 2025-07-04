<?php

return [

    'defaults' => [
        'guard' => 'web', // default guard tetap 'web' buat user biasa
        'passwords' => 'users',
    ],

    'guards' => [
        // Guard buat user biasa (pegawai)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard buat admin
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        // Provider buat user biasa (pegawai)
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Provider buat admin
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
