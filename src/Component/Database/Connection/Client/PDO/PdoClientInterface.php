<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientInterface;
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
interface PdoClientInterface extends ClientInterface
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
     * @param ConfigurationInterface $config
     *
     * @return PDO
    */
    public function makeConnection(ConfigurationInterface $config): PDO;





    /**
     * Determine if current driver is available
     *
     * @param string $driver
     * @return bool
    */
    public function hasAvailableDriver(string $driver): bool;





    /**
     * Returns all available drivers
     *
     * @return array
    */
    public function getAvailableDrivers(): array;
}
