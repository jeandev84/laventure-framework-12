<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory\Reader;

use Laventure\Component\Filesystem\Directory\Reader\Contract\DirectoryReaderInterface;

/**
 * DirectoryReader
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Contract
 */
class DirectoryReader implements DirectoryReaderInterface
{

    /**
     * @var string
    */
    protected string $directory;



    /**
     * @param string $directory
    */
    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }




    /**
     * @inheritDoc
    */
    public function read(): mixed
    {
       return '';
    }



    /**
     * @inheritDoc
    */
    public function getDirectory(): string
    {
        return $this->directory;
    }
}