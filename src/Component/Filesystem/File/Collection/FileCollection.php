<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Collection;

use Laventure\Component\Filesystem\File\File;

/**
 * FileCollection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Collection
*/
class FileCollection implements FileCollectionInterface
{
    /**
     * @var File[]
    */
    protected array $files = [];




    /**
     * @param File[] $files
    */
    public function __construct(array $files)
    {
        $this->addFiles($files);
    }



    /**
     * @param File $file
     *
     * @return File
    */
    public function addFile(File $file): File
    {
        return $this->files[] = $file;
    }




    /**
     * @param array $files
     *
     * @return $this
    */
    public function addFiles(array $files): static
    {
        foreach ($files as $file) {
            $this->addFile($file);
        }

        return $this;
    }






    /**
     * @inheritDoc
    */
    public function getFiles(): array
    {
        return $this->files;
    }
}
