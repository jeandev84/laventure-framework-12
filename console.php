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

/*
$collection = $filesystem->directoryFileCollection('app/Http/Controllers');
$basePath = $filesystem->getBasePath();
$controllers = [];
$paths = array_keys($collection->getPaths());
foreach ($paths as $path) {
    $path     = str_replace($basePath, '', $path);
    $path     = ltrim($path, '/');
    $info     = pathinfo($path);
    #dd($info);
    $dirname  = str_replace(
        ['app/Http/Controllers', '/'], ["App\\Http\\Controllers", "\\"], $info['dirname']);
    $filename = $info['filename'];
    $controllers[] =  "$dirname\\$filename";
}

dd($controllers);
*/