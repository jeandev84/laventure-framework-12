<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query;

/**
 * QueryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Contract
 */
interface QueryInterface
{
    /**
     * Prepare query
     *
     * @param string $sql
     * @return $this
    */
    public function prepare(string $sql): static;




    /**
     * Create no prepared query
     *
     * @param string $sql
     * @return $this
    */
    public function query(string $sql): static;





    /**
     * Set query params
     *
     * @param array $params
     * @return $this
    */
    public function params(array $params): static;





    /**
     * Execute query
     *
     * @return bool
    */
    public function execute(): bool;





    /**
     * @param string $sql
     * @return bool
    */
    public function exec(string $sql): bool;





    /**
     * @param string|null $name
     *
     * @return int
    */
    public function lastInsertId(string $name = null): int;
}
