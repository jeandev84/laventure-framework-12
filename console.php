<?php

require 'vendor/autoload.php';

/*
$file = new \Laventure\Component\Filesystem\File\File(__DIR__.'/docs/component/config/app.php');
dump($file->dir());
dd($file->info()->getRealPath());
*/

$filesystem = new \Laventure\Component\Filesystem\Filesystem(__DIR__);

/*
$iterator = $filesystem->dir('app/Http/Controllers')->iterate('php');
dd($iterator->getRecursion());
*/

dd($filesystem->dir('app/Http/Controllers')->getFiles());