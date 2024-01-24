<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;

/**
 * HasConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
 */
interface HasConnectionInterface
{
    /**
     * Connect to the database
     *
     * @param ConfigurationInterface $config
     *
     * @return void
    */
    public function connect(ConfigurationInterface $config): void;







    /**
     * Determine if the connection established
     *
     * @return bool
    */
    public function connected(): bool;








    /**
     * Disconnect to the database
     *
     * @return void
    */
    public function disconnect(): void;







    /**
     * Determine if connection is not established
     *
     * @return bool
    */
    public function disconnected(): bool;






    /**
     * Returns connection driver like PDO, mysqli ...
     *
     * @return mixed
    */
    public function getConnection(): mixed;
}
