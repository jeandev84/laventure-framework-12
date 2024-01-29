<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Client\PDO;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Configuration\NullConfiguration;
use Laventure\Component\Database\Client\PDO\Dsn\PdoDsnBuilder;
use Laventure\Component\Database\Client\PDO\Query\Query;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use PDO;
use PDOException;
use RuntimeException;

/**
 * Connection
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Client\PDO\Drivers
*/
abstract class Connection implements PdoConnectionInterface
{
    /**
     * @var PdoClientInterface
    */
    protected PdoClientInterface $client;



    /**
     * @var PDO|null
    */
    protected ?PDO $pdo;




    /**
     * @var ConfigurationInterface|null
    */
    protected ?ConfigurationInterface $config;




    /**
     * @param PdoClientInterface $client
    */
    public function __construct(PdoClientInterface $client)
    {
        $this->client   = $client;
        $this->config   = new NullConfiguration();
    }




    /**
     * @inheritDoc
    */
    public function connect(ConfigurationInterface $config): void
    {
        $this->pdo = $this->client->makeConnection(
            $this->resolveConfig($config)
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
    public function purge(): void
    {
        $this->config = null;
        $this->disconnect();
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
     * @inheritDoc
    */
    public function createQuery(): QueryInterface
    {
        return new Query($this->getConnection());
    }





    /**
     * @inheritDoc
    */
    public function statement(string $sql): QueryInterface
    {
        return $this->createQuery()->prepare($sql);
    }




    /**
     * @inheritDoc
    */
    public function executeQuery(string $sql): bool
    {
        return $this->createQuery()->exec($sql);
    }





    /**
     * @inheritDoc
    */
    public function configs(): ConfigurationInterface
    {
        return $this->config;
    }



    /**
     * @inheritDoc
    */
    public function config($key, $default = null): mixed
    {
        return $this->config->get($key, $default);
    }




    /**
     * @inheritDoc
    */
    public function beginTransaction(): bool
    {
        return $this->pdo->beginTransaction();
    }




    /**
     * @inheritDoc
    */
    public function hasActiveTransaction(): bool
    {
        return $this->pdo->inTransaction();
    }




    /**
     * @inheritDoc
    */
    public function commit(): bool
    {
        return $this->pdo->commit();
    }




    /**
     * @inheritDoc
    */
    public function rollback(): bool
    {
        return $this->pdo->rollBack();
    }





    /**
     * @inheritDoc
    */
    public function transaction(callable $func): bool
    {
        $this->beginTransaction();

        try {

            $func($this);
            return $this->commit();

        } catch (PDOException $e) {

            if ($this->hasActiveTransaction()) {
                $this->rollBack();
            }

            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }





    /**
     * @param ConfigurationInterface $config
     * @return ConfigurationInterface
    */
    private function resolveConfig(ConfigurationInterface $config): ConfigurationInterface
    {
        $config['dsn'] = $this->resolveDsn($config);
        return $config;
    }



    /**
     * @param ConfigurationInterface $config
     * @return string
    */
    private function resolveDsn(ConfigurationInterface $config): string
    {
        $driver = $config->get('driver', $this->getName());

        if ($config->has('dsn')) {
            $dsn = $config['dsn'];
            if (is_array($dsn)) {
                return $this->buildDsn($driver, $dsn);
            }
            return $dsn;
        }

        return $this->buildDsn($driver, $this->getDefaultDsnParams($config));
    }




    /**
     * @param string $driver
     * @param array $params
     * @return string
    */
    private function buildDsn(string $driver, array $params): string
    {
        return strval(PdoDsnBuilder::create($driver, $params));
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
     * Returns name of database
     *
     * @return string
   */
    protected function getDatabaseName(): string
    {
        if ($database = $this->config->database()) {
            return $database;
        }

        if (!$database = $this->retrieveDatabaseNameFromDsn()) {
            throw new RuntimeException(
                "Could not retrieve database name from (". $this->config('dsn') . ")"
            );
        }

        return $database;
    }




    /**
     * @return string|false
    */
    private function retrieveDatabaseNameFromDsn(): string|false
    {
        $dsn    = $this->config('dsn');
        $params = explode(':', $dsn, 2)[1];
        $params = explode(';', $params);

        foreach ($params as $param) {
            [$search, $value] = explode('=', $param, 2);
            if ($search === 'dbname') {
                return $value;
            }
        }

        return false;
    }
}
