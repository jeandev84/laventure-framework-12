<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Manager;


use Laventure\Component\Database\Connection\ConnectionInterface;

/**
 * DatabaseManagerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Manager
 */
interface DatabaseManagerInterface
{
    /**
     * Open connection by given name
     *
     * @param string $name
     * @param array $credentials
     * @return mixed
     */
    public function open(string $name, array $credentials): mixed;





    /**
     * Add all configurations
     *
     * @param array $configs
     *
     * @return $this
     */
    public function configurations(array $configs): static;






    /**
     * Add all connections
     *
     * @param ConnectionInterface[] $connections
     *
     * @return $this
     */
    public function connections(array $connections): static;







    /**
     * @param string $name
     *
     * @return mixed
     */
    public function configuration(string $name): mixed;





    /**
     * @param string $name
     *
     * @return ConnectionInterface
    */
    public function connection(string $name = ''): ConnectionInterface;






    /**
     * Determine if the given connection name closed.
     *
     * @param string $name
     *
     * @return bool
    */
    public function connected(string $name): bool;







    /**
     * Returns all configuration
     *
     * @return mixed
    */
    public function getConfigurations(): mixed;






    /**
     * Returns all connections
     *
     * @return ConnectionInterface[]
    */
    public function getConnections(): array;







    /**
     * Close manager
     *
     * @return void
    */
    public function close(): void;
}