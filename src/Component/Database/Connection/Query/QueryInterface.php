<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query;

use Laventure\Component\Database\Connection\Query\Result\QueryResultInterface;

/**
 * QueryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query
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
     * @param $param
     * @param $value
     * @param int $type
     * @return $this
    */
    public function bindParam($param, $value, int $type = 0): static;









    /**
     * @param $param
     * @param $value
     * @param int $type
     * @return $this
    */
    public function bindValue($param, $value, int $type = 0): static;





    /**
     * @param $column
     * @param $value
     * @param int $type
     * @return $this
     */
    public function bindColumn($column, $value, int $type = 0): static;







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
     * @return mixed
    */
    public function execute(): mixed;





    /**
     * Execute simple query
     *
     * @param string $sql
     * @return mixed
    */
    public function exec(string $sql): mixed;





    /**
     * Returns last insert ID
     *
     * @param string|null $name
     *
     * @return int
    */
    public function lastInsertId(string $name = null): int;





    /**
     * Save the class name to fetch
     *
     * @param string $classname
     *
     * @return $this
    */
    public function map(string $classname): static;







    /**
     * Fetch result by mode
     *
     * @return QueryResultInterface
    */
    public function fetch(): QueryResultInterface;









    /**
     * Returns query string
     *
     * @return string
    */
    public function getSQL(): string;
}
