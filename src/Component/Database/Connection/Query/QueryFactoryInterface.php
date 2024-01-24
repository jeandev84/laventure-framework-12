<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query;

use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;

/**
 * HasQueryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
*/
interface QueryFactoryInterface
{
    /**
     * Returns Query instance
     * @return QueryInterface
    */
    public function createQuery(): QueryInterface;
}
