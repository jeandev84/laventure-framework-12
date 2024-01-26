<?php

declare(strict_types=1);

namespace Laventure\Contract\Storage;

use ArrayAccess;
use Laventure\Contract\Parameter\ArrayParameterInterface;

/**
 * StorageInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Writer\Storage
*/
interface StorageInterface extends ArrayParameterInterface
{

    /**
     * session destroy
     *
     * @return mixed
    */
    public function destroy(): mixed;
}
