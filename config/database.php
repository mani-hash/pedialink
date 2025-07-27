<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Connection
    |--------------------------------------------------------------------------
    */
    'default' => env('DB_CONNECTION', 'pgsql'),

    /*
    |--------------------------------------------------------------------------
    | Database connections
    |--------------------------------------------------------------------------
    */
    'connections' => [

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', '127.0.0.1'),
            'port'     => env('DB_PORT', 5432),
            'database' => env('DB_DATABASE', 'myapp'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', ''),
            // 'charset'  => 'utf8',
            // 'schema'   => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Database Migrations
    |--------------------------------------------------------------------------
    */
    'migrations' => 'migrations',
];