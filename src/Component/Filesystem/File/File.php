<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File;

use Laventure\Component\Filesystem\File\Info\FileInfo;

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
     * @param string $path
    */
    public function __construct(string $path)
    {
        $this->path = $path;
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
    public function remove(): mixed
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
