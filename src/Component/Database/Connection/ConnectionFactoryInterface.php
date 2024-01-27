<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

/**
 * ConnectionFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
 */
interface ConnectionFactoryInterface
{
    /**
     * @param string $extension
     * @param string|null $driver
     * @return ConnectionInterface
    */
    public function createConnection(
        string $extension,
        string $driver = null
    ): ConnectionInterface;
}
