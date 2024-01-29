<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder\Factory;

use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;

/**
 * QueryBuilderFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder\Factory
*/
interface QueryBuilderFactoryInterface
{
    /**
     * @return QueryBuilderInterface
    */
    public function createQueryBuilder(): QueryBuilderInterface;
}
