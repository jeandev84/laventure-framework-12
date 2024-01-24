<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query;

/**
 * HasQueryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query
 */
interface HasQueryInterface
{
    /**
     * Prepare query
     *
     * @param string $sql
     *
     * @return QueryInterface
     */
    public function statement(string $sql): QueryInterface;






    /**
     * Get last insert id
     *
     * @param $name
     *
     * @return int
    */
    public function lastInsertId($name = null): int;





    /**
     * Execute query
     *
     * @param string $sql
     *
     * @return bool
    */
    public function exec(string $sql): bool;
}
