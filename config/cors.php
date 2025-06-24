<?php

return [
    'paths' => ['api/*'], // Atau '*' untuk semua route
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'], // Ganti dengan domain khusus di production
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];