<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Performance Optimization Settings
    |--------------------------------------------------------------------------
    |
    | These settings help optimize the application's performance by enabling
    | various caching mechanisms and optimizations.
    |
    */

    'cache' => [
        'categories_ttl' => env('CATEGORIES_CACHE_TTL', 3600), // 1 hour
        'search_ttl' => env('SEARCH_CACHE_TTL', 300), // 5 minutes
        'enabled' => env('PERFORMANCE_CACHE_ENABLED', true),
    ],

    'compression' => [
        'enabled' => env('RESPONSE_COMPRESSION_ENABLED', true),
        'level' => env('COMPRESSION_LEVEL', 6), // 1-9, 6 is good balance
        'min_size' => env('COMPRESSION_MIN_SIZE', 1024), // 1KB
    ],

    'database' => [
        'query_log' => env('DB_QUERY_LOG', false),
        'slow_query_threshold' => env('DB_SLOW_QUERY_THRESHOLD', 2000), // 2 seconds
    ],

    'assets' => [
        'versioning' => env('ASSET_VERSIONING', true),
        'minification' => env('ASSET_MINIFICATION', true),
        'combine_css' => env('COMBINE_CSS', true),
        'extract_vendors' => env('EXTRACT_VENDORS', true),
    ],
];