<?php

// config/cors.php
// Pakai ini kalau Mintlify Playground diset direct browser mode:
// docs.json -> api.playground.proxy = false
// Jika proxy = true, biasanya patch CORS ini tidak wajib untuk Playground.

return [
    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
    ],

    'allowed_methods' => ['GET', 'OPTIONS'],

    'allowed_origins' => [
        'https://docs.leuwongrr.online',
        'https://leuwongrr.online',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => [
        'Authorization',
        'Accept',
        'Content-Type',
        'X-Requested-With',
    ],

    'exposed_headers' => [
        'Retry-After',
        'X-RateLimit-Limit',
        'X-RateLimit-Remaining',
        'X-RateLimit-Reset',
    ],

    'max_age' => 600,

    'supports_credentials' => false,
];
