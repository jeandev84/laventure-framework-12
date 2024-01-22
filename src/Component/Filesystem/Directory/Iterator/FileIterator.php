<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory\Iterator;

use FilterIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;



/**
 * FileIterator
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Iterator
*/
class FileIterator extends FilterIterator
{

    /**
     * @var string
     */
    protected string $directory;


    /**
     * @var string
     */
    protected string $extension;




    /**
     * @param string $directory
     *
     * @param string $extension
     */
    public function __construct(string $directory, string $extension)
    {
        $this->directory = $directory;
        $this->extension = $extension;



        parent::__construct($this->recursiveIterator);
    }




    /**
     * @return RecursiveDirectoryIterator
     */
    public function getDirectoryIterator(): RecursiveDirectoryIterator
    {
        return $this->directoryIterator;
    }




    /**
     * @return RecursiveIteratorIterator
     */
    public function getRecursiveIterator(): RecursiveIteratorIterator
    {
        return $this->recursiveIterator;
    }





    /**
     * @inheritDoc
    */
    public function accept(): bool
    {
        $extension = pathinfo($this->current(), PATHINFO_EXTENSION);

        return $this->extension === $extension;
    }
}