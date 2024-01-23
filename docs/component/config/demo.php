<?php

use Laventure\Component\Filesystem\File\Loader\ArrayLoader;
use Laventure\Component\Filesystem\Filesystem;
use Laventure\Dotenv\Loader\DotenvLoader;

require 'vendor/autoload.php';

/*
$dotenvLoader = new DotenvLoader(__DIR__.'/.env');
$dotenvLoader->load();


$dotenv = new \Laventure\Dotenv\Dotenv(__DIR__);
$dotenv->load();

dump($_ENV);

dump(get_defined_functions());
dump(get_defined_constants());
dump(get_defined_vars())
dump(get_called_class());

require __DIR__.'/src/Foundation/helpers.php';
$filesystem = new Filesystem(dirname(__DIR__));

$collection = $filesystem->collection('/config/params/*.php');

$arrayLoader = new ArrayLoader($collection);

dd($arrayLoader->load());
*/