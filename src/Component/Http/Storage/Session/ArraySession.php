<?php

declare(strict_types=1);

namespace Laventure\Component\Http\Storage\Session;

use Laventure\Contract\Storage\StorageInterface;
use Laventure\Utils\Parameter\ArrayParameter;

/**
 * ArraySession ( This is used for unit testing for example )
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Http\Message\Request\Session
*/
class ArraySession  extends ArrayParameter implements StorageInterface
{
    /**
     * @inheritDoc
     */
    public function destroy(): bool
    {
        $this->params = [];

        return $this->empty();
    }
}
