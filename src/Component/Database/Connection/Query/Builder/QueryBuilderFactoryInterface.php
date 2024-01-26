<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

/**
 * QueryBuilderFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
*/
interface QueryBuilderFactoryInterface
{
    /**
     * @return QueryBuilderInterface
    */
    public function createQueryBuilder(): QueryBuilderInterface;
}
