<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;

use Laventure\Component\Database\Connection\Client\PDO\PdoConnectionInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;

/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
abstract class QueryBuilder implements QueryBuilderInterface
{

       /**
        * @var PdoConnectionInterface
       */
       protected PdoConnectionInterface $connection;



       /**
        * @param PdoConnectionInterface $connection
       */
       public function __construct(PdoConnectionInterface $connection)
       {
           $this->connection = $connection;
       }
}