<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Closure;
use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientException;
use Laventure\Component\Database\Connection\Client\PDO\Dsn\PdoDsnBuilder;
use Laventure\Component\Database\Connection\Client\PDO\Query\Query;
use Laventure\Component\Database\Connection\Client\PDO\Query\QueryBuilder;
use Laventure\Component\Database\Connection\Exception\DriverConnectionException;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use PDO;
use PDOException;
use Throwable;

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


    /**
     * @param ConfigurationInterface $config
    */
    public function connect(ConfigurationInterface $config): void
    {
        $this->pdo = $this->makePdo(
            $this->makeDsn($config),
            $config->username(),
            $config->password(),
            $config->get('options', [])
        );

        $this->config = $config;
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
    public function beginTransaction(): bool
    {
        return $this->getConnection()->beginTransaction();
    }





    /**
     * @inheritDoc
    */
    public function hasActiveTransaction(): bool
    {
        return $this->getConnection()->inTransaction();
    }




    /**
     * @inheritDoc
    */
    public function commit(): bool
    {
        return $this->getConnection()->commit();
    }




    /**
     * @inheritDoc
    */
    public function rollback(): bool
    {
        return $this->getConnection()->rollBack();
    }





    /**
     * @inheritDoc
    */
    public function transaction(Closure $func): mixed
    {
        $this->beginTransaction();

        try {

            $func($this);
            return $this->commit();

        } catch (PDOException $e) {

            if ($this->hasActiveTransaction()) {
                $this->rollBack();
            }

            $this->disconnect();

            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }






    /**
     * @inheritDoc
    */
    public function getConnection(): PDO
    {
        if (!$this->pdo) {
            throw new ClientException("Could not detect PDO connection");
        }

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
     * @return QueryBuilderInterface
    */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new QueryBuilder($this);
    }




    /**
     * @param ConfigurationInterface $config
     * @return string
    */
    public function makeDsn(ConfigurationInterface $config): string
    {
        $driver = $config->driver();

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
        } catch (Throwable $e) {
            throw new PDOException($e->getMessage());
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
     * @param string $name
     * @return bool
     */
    public function hasDriver(string $name): bool
    {
        return in_array($name, $this->getDrivers());
    }






    /**
     * @param ConfigurationInterface $config
     * @return array
    */
    private function getDefaultDsnParams(ConfigurationInterface $config): array
    {
        return [
            'host'     => $config->host(),
            'dbname'   => $config->database(),
            'charset'  => $config->charset() ?? 'utf8',
            'username' => $config->username() ?? '',
            'password' => $config->password() ?? ''
        ];
    }




    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'pdo';
    }
}
