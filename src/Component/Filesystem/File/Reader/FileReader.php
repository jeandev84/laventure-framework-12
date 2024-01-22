<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Reader;

use Laventure\Component\Filesystem\File\HasFileTrait;
use Laventure\Component\Filesystem\File\Reader\Contract\FileReaderInterface;

/**
 * FileReader
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Contract
 */
class FileReader implements FileReaderInterface
{

    use HasFileTrait;


    /**
     * @param string $file
    */
    public function __construct(string $file = '')
    {
        $this->setFile($file);
    }




    /**
     * @inheritDoc
    */
    public function readAsArray(): array
    {
        return file($this->file) ?: [];
    }



    /**
     * @inheritDoc
    */
    public function read(): string
    {
       return strval(file_get_contents($this->file));
    }
}
