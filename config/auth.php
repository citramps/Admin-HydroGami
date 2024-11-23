<?php

return [

    'defaults' => [
    'guard' => 'web',  // Menggunakan guard default 'web'
    'passwords' => 'users', // Bisa diganti sesuai kebutuhan
],

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'admins', // Anda bisa pakai 'admins' jika sudah mendefinisikan provider
    ],
],

'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,  // Pastikan model Admin sudah benar
    ],
],

'passwords' => [
    'admins' => [
        'provider' => 'admins',  // Untuk reset password (bisa diubah sesuai kebutuhan)
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
    ],
],


    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
