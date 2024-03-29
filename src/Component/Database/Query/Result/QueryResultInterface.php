<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Result;

/**
 * QueryResultInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Result
*/
interface QueryResultInterface
{
    /**
     * Fetch all result
     *
     * @return mixed
    */
    public function all(): array;





    /**
     * Fetch one result
     *
     * @return mixed
    */
    public function one(): mixed;





    /**
     * Fetch result as array
     *
     * @return array
    */
    public function assoc(): array;





    /**
     * Fetch column
     *
     * @param int $column
     *
     * @return mixed
    */
    public function column(int $column = 0): mixed;






    /**
     * Fetch all columns
     *
     * @return mixed
    */
    public function columns(): mixed;








    /**
     * Returns rows count
     *
     * @return int
    */
    public function count(): int;
}
