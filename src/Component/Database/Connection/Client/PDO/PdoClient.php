<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\ConnectionException;
use Laventure\Component\Database\Connection\ConnectionInterface;
use PDO;
use PDOException;

/**
 * PdoClient
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO
*/
class PdoClient implements PdoClientInterface
{


    /**
     * @var array
    */
    protected array $options = [
        PDO::ATTR_PERSISTENT          => true,
        PDO::ATTR_EMULATE_PREPARES    => 0,
        PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION
    ];




    /**
     * @var string
    */
    protected string $driver;



    /**
     * @var PdoConnectionFactory
    */
    protected PdoConnectionFactory $factory;





    /**
     * @param string $driver
    */
    public function __construct(string $driver = 'mysql')
    {
        $this->factory = new PdoConnectionFactory();
        $this->driver  = $driver;
    }





    /**
     * @inheritDoc
    */
    public function getDriver(): string
    {
        return $this->driver;
    }




    /**
     * @inheritDoc
    */
    public function makePdo(
        string $dsn,
        string $username = null,
        string $password = null,
        array $options = []
    ): PDO
    {
        try {
            $pdo = new PDO($dsn, $username, $password, $this->options);
            foreach ($options as $key => $value) {
                $pdo->setAttribute($key, $value);
            }
            return $pdo;
        } catch (PDOException $e) {
            throw new ConnectionException($e->getMessage());
        }
    }




    /**
     * @inheritDoc
    */
    public function makeConnection(ConfigurationInterface $config): PDO
    {
        return $this->makePdo(
            $config->required('dsn'),
            $config->username(),
            $config->password(),
            $config->get('options', [])
        );
    }




    /**
     * @inheritDoc
    */
    public function hasAvailableDriver(): bool
    {
        return in_array($this->driver, $this->getAvailableDrivers());
    }




    /**
     * @inheritDoc
    */
    public function getAvailableDrivers(): array
    {
        return PDO::getAvailableDrivers();
    }




    /**
     * @inheritDoc
     */
    public function getConnection(): ConnectionInterface
    {

    }




    /**
     * @inheritDoc
    */
    public function getConnections(): array
    {

    }
}