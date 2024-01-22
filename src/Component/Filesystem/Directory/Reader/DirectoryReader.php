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
 * @package  Laventure\Component\Filesystem\Reader
 */
class DirectoryReader implements DirectoryReaderInterface
{
    /**
     * @inheritDoc
    */
    public function readDirectory(string $directory): mixed
    {

    }
}