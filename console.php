<?php

require 'vendor/autoload.php';

$file = new \Laventure\Component\Filesystem\File\File(__DIR__.'/docs/component/config/app.php');


dump($file->dir());
dd($file->info()->getRealPath());