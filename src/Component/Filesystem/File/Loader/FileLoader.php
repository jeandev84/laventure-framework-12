<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Loader;

use Laventure\Component\Filesystem\File\Loader\Contract\FileLoaderInterface;

/**
 * FileLoader
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Loader
 */
class FileLoader implements FileLoaderInterface
{
    /**
     * @var string
    */
    protected string $file;



    /**
     * @param string $file
    */
    public function __construct(string $file)
    {
        $this->file = $file;
    }



    /**
     * @inheritDoc
    */
    public function getFile(): string
    {
        return $this->file;
    }




    /**
     * @inheritDoc
    */
    public function load(): mixed
    {
        return require_once $this->file;
    }
}
