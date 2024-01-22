<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Reader\Contract;

use Laventure\Component\Filesystem\Contract\Reader\ReaderInterface;
use Laventure\Component\Filesystem\File\HasFileInterface;

/**
 * ReaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Contract\Contract
*/
interface FileReaderInterface extends ReaderInterface, HasFileInterface
{

       /**
        * Read file as array
        *
        * @return array
       */
       public function readAsArray(): array;
}
