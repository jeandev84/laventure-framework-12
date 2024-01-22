<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory\Reader;

use Laventure\Component\Filesystem\Directory\HasDirectoryTrait;
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

    use HasDirectoryTrait;



    /**
     * @param string $directory
    */
    public function __construct(string $directory = '')
    {
        $this->setDirectory($directory);
    }




    /**
     * @inheritDoc
    */
    public function read(): mixed
    {
       return '';
    }
}