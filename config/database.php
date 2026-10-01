<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    */

    'connections' => [

        /*
        |--------------------------------------------------------------------------
        | MySQL Database
        |--------------------------------------------------------------------------
        */

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),

            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),

            'database' => env('DB_DATABASE', 'elan_travel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),

            'unix_socket' => env('DB_SOCKET', ''),

            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',

            'prefix' => '',
            'prefix_indexes' => true,

            'strict' => true,
            'engine' => null,

            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::ATTR_EMULATE_PREPARES => false,
            ]) : [],
        ],

        /*
        |--------------------------------------------------------------------------
        | SQLite
        |--------------------------------------------------------------------------
        */

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => true,
        ],

        /*
        |--------------------------------------------------------------------------
        | PostgreSQL
        |--------------------------------------------------------------------------
        */

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),

            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),

            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),

            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,

            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        /*
        |--------------------------------------------------------------------------
        | SQL Server
        |--------------------------------------------------------------------------
        */

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),

            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),

            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),

            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,

            'encrypt' => 'no',
            'trust_server_certificate' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', ''),
        ],

        'default' => [
            'url' => env('REDIS_URL'),

            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),

            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),

            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),

            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];