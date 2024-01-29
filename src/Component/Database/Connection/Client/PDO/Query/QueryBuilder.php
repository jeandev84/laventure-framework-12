<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;


use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderTrait;

/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
class QueryBuilder implements QueryBuilderInterface
{
      use QueryBuilderTrait;
}