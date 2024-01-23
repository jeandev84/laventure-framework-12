<?php

use Laventure\Dotenv\Loader\DotenvLoader;

require 'vendor/autoload.php';

/*
$dotenvLoader = new DotenvLoader(__DIR__.'/.env');
$dotenvLoader->load();
*/

$dotenv = new \Laventure\Dotenv\Dotenv(__DIR__);
$dotenv->load();

dd($_ENV);