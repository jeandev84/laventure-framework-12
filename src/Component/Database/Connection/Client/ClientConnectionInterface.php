<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\HasConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderFactoryInterface;
use Laventure\Component\Database\Connection\Query\QueryFactoryInterface;
use Laventure\Component\Database\Connection\Transaction\TransactionInterface;

/**
 * ClientInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client
*/
interface ClientConnectionInterface extends HasConnectionInterface, QueryFactoryInterface, QueryBuilderFactoryInterface, TransactionInterface
{

}
