<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Configuration\NullConfiguration;
use Laventure\Component\Database\Connection\Client\ClientType;
use Laventure\Component\Database\Connection\Client\PDO\Dsn\PdoDsnBuilder;
use Laventure\Component\Database\Connection\Client\PDO\Query\Query;
use Laventure\Component\Database\Connection\Client\PDO\Transaction\Transaction;
use Laventure\Component\Database\Connection\ConnectionException;
use Laventure\Component\Database\Connection\Drivers\DriverException;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\Connection\Transaction\TransactionInterface;
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
     * @var Configuration
     */
    protected ConfigurationInterface $config;



    /**
     * @var PDO
    */
    protected $pdo;





    /**
     * @var array
     */
    protected array $options = [
        PDO::ATTR_PERSISTENT          => true,
        PDO::ATTR_EMULATE_PREPARES    => 0,
        PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION
    ];




    public function __construct()
    {
        $this->config = new NullConfiguration();
    }



    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return ClientType::Pdo;
    }





    /**
     * @inheritDoc
    */
    public function credentials(ConfigurationInterface $config): static
    {
        $this->config  = $config;

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function connect(): static
    {
        $this->pdo = $this->makePdo(
            $this->makeDsn($this->config),
            $this->config->username(),
            $this->config->password(),
            $this->config->get('options', [])
        );

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function connected(): bool
    {
        return $this->pdo instanceof PDO;
    }





    /**
     * @inheritDoc
     */
    public function disconnect(): void
    {
        $this->pdo = null;
    }





    /**
     * @inheritDoc
     */
    public function disconnected(): bool
    {
        return is_null($this->pdo);
    }





    /**
     * @inheritDoc
    */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }




    /**
     * @return QueryInterface
     */
    public function createQuery(): QueryInterface
    {
        return new Query($this->getConnection());
    }




    /**
     * @inheritDoc
    */
    public function createTransaction(): TransactionInterface
    {
        return new Transaction($this->getConnection());
    }





    /**
     * @inheritDoc
    */
    public function makePdo(
        string $dsn,
        string $username = null,
        string $password = null,
        array $options = []
    ): PDO {
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
    public function getDrivers(): array
    {
        return PDO::getAvailableDrivers();
    }





    /**
     * @inheritdoc
    */
    public function hasDriver(string $name): bool
    {
        return in_array($name, $this->getDrivers());
    }





    /**
     * @param ConfigurationInterface $config
     *
     * @return string
    */
    private function makeDsn(ConfigurationInterface $config): string
    {
        $driver = $config->required('driver');

        if ($config->has('dsn')) {
            $dsn = $config['dsn'];
            if (is_array($dsn)) {
                return strval(new PdoDsnBuilder($driver, $dsn));
            }
            return $dsn;
        }

        return strval(new PdoDsnBuilder($driver, $this->getDefaultDsnParams($config)));
    }





    /**
     * @param ConfigurationInterface $config
     * @return array
    */
    private function getDefaultDsnParams(ConfigurationInterface $config): array
    {
        return [
            'host'     => $config->host(),
            'port'     => $config->port(),
            'dbname'   => $config->database(),
            'charset'  => $config->charset() ?? 'utf8',
            'username' => $config->username() ?? '',
            'password' => $config->password() ?? ''
        ];
    }






    /**
     * @inheritDoc
    */
    public function reconnect(): static
    {
        return $this->connect();
    }






    /**
     * @inheritDoc
    */
    public function getConfiguration(): ConfigurationInterface
    {
        return $this->config;
    }
}
