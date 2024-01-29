<?php

return [

    /*
    |---------------------------------------------------------------------
    |     Connection to database [ mysql, sqlite, pgsql, oci (oracle) ]
    |---------------------------------------------------------------------
    */
    'connection' => env('DB_TYPE', 'mysql'),
    'extension'  => 'pdo',
    'pdo' => [
        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => 'laventure.db', // TODO wrap with base url something like base_url('/path/to/db');
            'options'  => []
        ],
        'mysql' => [
            'driver'     => 'mysql',
            'database'   =>  env('DB_NAME', 'homestead'),
            'host'       =>  env('DB_HOST', '127.0.0.1'),
            'port'       =>  env('DB_PORT', '3306'),
            'username'   =>  env('DB_USER', 'root'),
            'password'   =>  env('DB_PASS', 'root'),
            'collation'  => 'utf8_unicode_ci',
            'charset'    => 'utf8',
            'prefix'     => '',
            'engine'     => 'InnoDB', // MyISAM
            'options'    => []

        ],
        'pgsql' => [
            'driver'     => 'pgsql',
            'database'   => env('DB_NAME', 'homestead'),
            'host'       => env('DB_HOST', '127.0.0.1'),
            'port'       => env('DB_PORT', '5432'),
            'username'   => env('DB_USER', 'postgres'),
            'password'   => env('DB_PASS', '123456'),
            'collation'  => 'utf8_unicode_ci',
            'charset'    => 'utf8',
            'prefix'     => '',
            'engine'     => 'InnoDB', // MyISAM
            'options'    => [],
        ]
    ],
    'mysqli' => [
        'connection' => 'mysqli',
        'database'   => env('DB_NAME', 'homestead'),
        'host'       => env('DB_HOST', '127.0.0.1'),
        'port'       => env('DB_PORT', '3306'),
        'username'   => env('DB_USER', 'root'),
        'password'   => env('DB_PASS', 'secret'),
        'collation'  => 'utf8_unicode_ci',
        'charset'    => 'utf8',
        'prefix'     => ''
    ]
];