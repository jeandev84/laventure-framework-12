<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Contract\DQL;

use Stringable;

/**
 * SelectBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL
*/
interface SelectBuilderInterface extends Stringable
{
    /**
     * select columns
     *
     * @param string ...$columns
     * @return $this
    */
    public function select(string ...$columns): static;





    /**
     * Add columns
     *
     * @param string $columns
     * @return $this
     */
    public function addSelect(string $columns): static;




    /**
     * Select the table
     *
     * @param string $table
     * @param string|null $alias
     * @return $this
     */
    public function from(string $table, string $alias = null): static;








    /**
     * Join table
     * @param string $table
     * @param string $condition
     * @return $this
     */
    public function join(string $table, string $condition): static;







    /**
     * Join table
     * @param string $table
     * @param string $condition
     * @return $this
     */
    public function leftJoin(string $table, string $condition): static;







    /**
     * Join table
     * @param string $table
     * @param string $condition
     * @return $this
     */
    public function rightJoin(string $table, string $condition): static;







    /**
     * Join table
     * @param string $table
     * @param string $condition
     * @return $this
     */
    public function innerJoin(string $table, string $condition): static;








    /**
     * Join table
     * @param string $table
     * @param string $condition
     * @return $this
     */
    public function fullJoin(string $table, string $condition): static;








    /**
     * @param string $join
     *
     * @return $this
     */
    public function addJoin(string $join): static;





    /**
     * @param string $column
     *
     * @return $this
     */
    public function groupBy(string $column): static;






    /**
     * @param array|string $groupBy
     * @return $this
     */
    public function addGroupBy(array|string $groupBy): static;





    /**
     * @param string $condition
     * @return $this
     */
    public function having(string $condition): static;





    //
    //    /**
    //     * @param string $condition
    //     * @return $this
    //    */
    //    public function andHaving(string $condition): static;
    //
    //
    //
    //
    //
    //
    //    /**
    //     * @param string $condition
    //     * @return $this
    //    */
    //    public function orHaving(string $condition): static;



    /**
     * @param string $column
     * @param string|null $direction
     * @return $this
     */
    public function orderBy(string $column, string $direction = null): static;





    /**
     * @param string $column
     * @param string|null $direction
     * @return $this
     */
    public function addOrderBy(string $column, string $direction = null): static;






    /**
     * Set max results
     *
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit): static;





    /**
     * Set min results
     *
     * @param int $offset
     * @return $this
    */
    public function offset(int $offset): static;







    /**
     * Returns select query
     *
     * @return string
    */
    public function buildSelectQuery(): string;
}