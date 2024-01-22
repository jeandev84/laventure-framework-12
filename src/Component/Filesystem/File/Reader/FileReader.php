<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Reader;

use Laventure\Component\Filesystem\File\Reader\Contract\FileReaderInterface;

/**
 * FileReader
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Reader
 */
class FileReader implements FileReaderInterface
{
    /**
     * @inheritDoc
    */
    public function read(string $file): mixed
    {

    }
}
