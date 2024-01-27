<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;


use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\ConnectionInterface;
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
      * Returns driver name
      *
      * @return string
     */
     public function getDriver(): string;




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
    public function make(ConfigurationInterface $config): PDO;





    /**
     * Determine if current driver is available
     *
     * @return bool
    */
    public function hasAvailableDriver(): bool;





    /**
     * Returns all available drivers
     *
     * @return array
    */
    public function getAvailableDrivers(): array;
}