<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\Reader;

/**
 * FileReaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Reader
*/
interface FileReaderInterface
{
    /**
     * Read file as string
     *
     * @param string $file
     *
     * @return mixed
    */
    public function read(string $file): mixed;
}
