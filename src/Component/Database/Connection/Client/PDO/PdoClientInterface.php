<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use PDO;

/**
 * PdoInterfaceClient
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Contract
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
     * Returns all available drivers
     *
     * @return array
    */
    public function getDrivers(): array;
}
