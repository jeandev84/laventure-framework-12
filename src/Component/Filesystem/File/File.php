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
class File
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
     * @return mixed
    */
    public function info(): FileInfo
    {
       return new FileInfo($this->path);
    }


    /**
     * @param string $directory
     * @param string $extension
     * @return mixed
    */
    public function iterate(string $directory, string $extension): mixed
    {

    }




    /**
     * @return mixed
    */
    public function read(): mixed
    {

    }




    /**
     * @return string
    */
    public function getPath(): string
    {
        return $this->path;
    }
}
