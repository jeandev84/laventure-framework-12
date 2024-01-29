<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Manager;

use Laventure\Component\Database\Configuration\Configuration;
use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\ExtensionException;
use Laventure\Component\Database\Connection\Factory\ConnectionFactory;
use Laventure\Component\Database\DatabaseException;

/**
 * DatabaseManager
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Manager
 */
class DatabaseManager implements DatabaseManagerInterface
{
    /**
     * Default connection driver
     *
     * @var string|null
    */
    protected ?string $connection;



    /**
     * @var ConnectionFactory
    */
    protected ConnectionFactory $factory;



    /**
     * PDO is default extension
     *
     * @var string|null
    */
    protected ?string $extension = 'pdo';



    /**
     * @var ConnectionInterface[]
    */
    protected array $connections = [];




    /**
     * @var array
    */
    protected array $config = [];





    /**
     * @var ConnectionInterface[]
    */
    protected array $connected = [];





    public function __construct()
    {
        $this->factory = new ConnectionFactory();
    }




    /**
     * @inheritDoc
    */
    public function open(string $name, array $credentials): static
    {
        $this->connection = $name;
        $this->config($name, $credentials);

        return $this;
    }






    /**
     * @param string $name
     * @param array $credentials
     * @return $this
    */
    public function config(string $name, array $credentials): static
    {
        $this->config[$name] = $credentials;

        return $this;
    }




    /**
     * @param string $extension
     * @return $this
    */
    public function extension(string $extension): static
    {
        $this->extension = $extension;

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function configurations(array $configs): static
    {
        foreach ($configs as $name => $config) {
            $this->config[$name] = $config;
        }

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function connections(array $connections): static
    {
        foreach ($connections as $connection) {
            $this->setConnection($connection);
        }

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function configuration(string $name): mixed
    {
        if ($this->extension) {
            if (!empty($this->config[$this->extension][$name])) {
                return $this->config[$this->extension][$name];
            }
        }

        if (empty($this->config[$name])) {
            throw new DatabaseException("Empty params for connection ($name)");
        }

        return $this->config[$name];
    }






    /**
     * @inheritDoc
    */
    public function connection(string $name = ''): ConnectionInterface
    {
        $name        = $name ?: $this->getCurrentConnection();
        $credentials = $this->configuration($name);

        if (!$this->hasConnection($name)) {
            $this->connections[$name] = $this->factory->make(
                $name,
                $this->extension
            );
        }

        return $this->connect($name, new Configuration($credentials));
    }





    /**
     * @inheritDoc
     */
    public function connected(string $name): bool
    {
        return isset($this->connected[$name]);
    }






    /**
     * @inheritDoc
     */
    public function getConfigurations(): array
    {
        return $this->config;
    }





    /**
     * @inheritDoc
     */
    public function getConnections(): array
    {
        return $this->connections;
    }






    /**
     * Add connection
     *
     * @param ConnectionInterface $connection
     *
     * @return $this
     */
    public function setConnection(ConnectionInterface $connection): static
    {
        $this->connections[$connection->getName()] = $connection;

        return $this;
    }






    /**
     * @param string $name
     * @return bool
    */
    public function hasConnection(string $name): bool
    {
        return isset($this->connections[$name]);
    }






    /**
     * @param string $connection
     * @return void
    */
    public function setCurrentConnection(string $connection): void
    {
        $this->connection = $connection;
    }



    /**
     * @return string|null
     */
    public function getCurrentConnection(): ?string
    {
        return $this->connection;
    }





    /**
     * @return string|null
     */
    public function getCurrentExtension(): ?string
    {
        return $this->extension;
    }







    /**
     * @inheritDoc
     */
    public function close(): void
    {
       $this->config      = [];
       $this->connections = [];
       $this->connected   = [];
       $this->extension   = null;
       $this->connection  = null;
    }





    /**
     * @param string $name
     * @param Configuration $config
     * @return ConnectionInterface
     * @throws DatabaseException
     */
    private function connect(string $name, Configuration $config): ConnectionInterface
    {
        $this->connections[$name]->connect($config);

        if (!$this->connections[$name]->connected()) {
            throw new DatabaseException("no connection detected for '$name'.");
        }

        $this->setCurrentConnection($name);

        return $this->connected[$name] = $this->connections[$name];
    }
}
