<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\ConnectibleInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderFactoryInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\QueryFactoryInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;
use Laventure\Component\Database\Connection\Status\ConnectionStatusInterface;
use Laventure\Component\Database\Connection\Transaction\TransactionFactoryInterface;
use Laventure\Component\Database\Connection\Transaction\TransactionInterface;

/**
 * ClientConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client
*/
interface ClientConnectionInterface extends ConnectionStatusInterface
{
    /**
     * Parse credentials
     *
     * @param ConfigurationInterface $config
     * @return $this
    */
    public function credentials(ConfigurationInterface $config): static;






    /**
     * Connect to driver
     *
     * @return mixed
    */
    public function connect(): static;







    /**
     * Disconnect client
     *
     * @return void
    */
    public function disconnect(): void;







    /**
     * Reconnect client
     *
     * @return mixed
    */
    public function reconnect(): mixed;








    /**
     * Returns name of client
     *
     * @return mixed
    */
    public function getName(): mixed;







    /**
     * Returns driver connection
     *
     * @return mixed
    */
    public function getConnection(): mixed;





    /**
     * Returns configuration
     *
     * @return ConfigurationInterface
    */
    public function getConfiguration(): ConfigurationInterface;







    /**
     * Create query
     *
     * @return QueryInterface
    */
    public function createQuery(): QueryInterface;





    /**
     * Create a transaction
     *
     * @return TransactionInterface
    */
    public function createTransaction(): TransactionInterface;
}
