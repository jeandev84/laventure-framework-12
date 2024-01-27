<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use PDO;

/**
 * PdoClientInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO
 */
interface PdoClientInterface extends ClientConnectionInterface
{
    /**
     * @param string $dsn
     * @param string|null $username
     * @param string|null $password
     * @param array $options
     * @return PDO
    */
    public function makePdo(
        string $dsn,
        string $username = null,
        string $password = null,
        array $options = []
    ): PDO;




    /**
     * Returns instance of PDO
     *
     * @return PDO
    */
    public function getConnection(): PDO;





    /**
     * Determine if is available driver
     *
     * @param string $name
     * @return bool
    */
    public function hasDriver(string $name): bool;





    /**
     * Returns all available drivers
     *
     * @return array
     */
    public function getDrivers(): array;
}
