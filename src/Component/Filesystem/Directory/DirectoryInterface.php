<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory;


use Laventure\Component\Filesystem\Directory\Iterator\DirectoryIterator;

/**
 * DirectoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Directory
 */
interface DirectoryInterface
{

    /**
     * @return mixed
    */
    public function info(): mixed;



    /**
     * @param string $extension
     *
     * @return mixed
    */
    public function iterate(string $extension): mixed;




    /**
     * @return mixed
    */
    public function read(): mixed;




    /**
     * @return string
    */
    public function getPath(): string;





    /**
     * @return mixed
    */
    public function scan(): mixed;
}