<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Writer\Contract;

use Laventure\Component\Filesystem\File\Contract\HasFileInterface;
use Laventure\Contract\Writer\WriterInterface;

/**
 * FileWriterInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Writer\Contract
*/
interface FileWriterInterface extends WriterInterface, HasFileInterface
{
    /**
     * @param int $flags
     *
     * @return static
    */
    public function flags(int $flags): static;
}
