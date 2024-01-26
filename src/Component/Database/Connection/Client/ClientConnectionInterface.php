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
interface ClientConnectionInterface extends ConnectibleInterface, TransactionInterface
{

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
     * @return QueryInterface
    */
    public function createQuery(): QueryInterface;
}
