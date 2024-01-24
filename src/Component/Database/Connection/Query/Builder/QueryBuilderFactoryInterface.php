<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;

/**
 * QueryBuilderFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
 */
interface QueryBuilderFactoryInterface
{
    /**
     * Returns Query builder
     *
     * @return QueryBuilderInterface
    */
    public function createQueryBuilder(): QueryBuilderInterface;
}
