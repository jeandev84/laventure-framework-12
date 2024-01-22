<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File;

use Laventure\Component\Filesystem\File\Info\FileInfo;
use Laventure\Component\Filesystem\File\Loader\FileLoader;
use Laventure\Component\Filesystem\File\Reader\FileReader;
use Laventure\Component\Filesystem\File\Uploader\FileUploader;

/**
 * File
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem
*/
class File implements FileInterface
{

    /**
     * @var string
    */
    protected string $path;


    /**
     * @var FileReader
    */
    protected FileReader $reader;


    /**
     * @var FileLoader $loader
    */
    protected FileLoader $loader;



    /**
     * @var FileUploader
    */
    protected FileUploader $uploader;


    /**
     * @param string $path
    */
    public function __construct(string $path)
    {
        $this->path     = $path;
        $this->reader   = new FileReader($path);
        $this->loader   = new FileLoader($path);
        $this->uploader = new FileUploader($path);
    }



    /**
     * @inheritDoc
    */
    public function exists(): bool
    {
        return file_exists($this->path);
    }




    /**
     * @inheritDoc
    */
    public function load(): mixed
    {
        if (! $this->exists()) {
            return false;
        }

        return $this->loader->load();
    }




    /**
     * @inheritDoc
    */
    public function make(): mixed
    {

    }




    /**
     * @inheritDoc
    */
    public function dir(): mixed
    {

    }




    /**
     * @inheritDoc
    */
    public function read(): mixed
    {

    }




    /**
     * @inheritDoc
    */
    public function readAsArray(): array
    {

    }





    /**
     * @inheritDoc
    */
    public function write(string $content, bool $append = false): false|int
    {

    }




    /**
     * @inheritDoc
    */
    public function rewrite(string $content): bool|int
    {

    }




    /**
     * @inheritDoc
    */
    public function copyTo(string $destination, $context = null): bool
    {

    }




    /**
     * @inheritDoc
    */
    public function moveTo(string $destination): bool
    {

    }




    /**
     * @inheritDoc
    */
    public function stub(array $patterns): string
    {
        $searched = array_keys($patterns);
        $replaced = array_values($patterns);

        return (string) str_replace($searched, $replaced, $this->read());
    }




    /**
     * @inheritDoc
    */
    public function remove(): bool
    {
        if (! $this->exists()) {
            return false;
        }

        return unlink($this->getPath());
    }




    /**
     * @inheritDoc
    */
    public function info(): FileInfo
    {
        return new FileInfo($this->getPath());
    }




    /**
     * @inheritDoc
    */
    public function getPath(): string
    {
        return $this->path;
    }
}
