<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Status;

/**
 * ConnectionStatusInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Status
 */
interface ConnectionStatusInterface
{
    /**
     * Determine if the connection established
     *
     * @return bool
    */
    public function connected(): bool;




    /**
     * Determine if connection is not established
     *
     * @return bool
    */
    public function disconnected(): bool;
}
