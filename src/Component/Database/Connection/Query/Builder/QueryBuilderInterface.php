<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;



use Stringable;

/**
 * QueryBuilderInterface (Decorate query builder)
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
*/
interface QueryBuilderInterface extends Stringable
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






    /**
     * @param string $condition
     * @return $this
    */
    public function andHaving(string $condition): static;






    /**
     * @param string $condition
     * @return $this
    */
    public function orHaving(string $condition): static;







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
    public function setMaxResults(int $limit): static;





    /**
     * Set min results
     *
     * @param int $offset
     * @return $this
    */
    public function setFirstResult(int $offset): static;






    /**
     * @param string $table
     * @return $this
    */
    public function insert(string $table): static;





    /**
     * @param array $values
     *
     * @return $this
    */
    public function values(array $values): static;





    /**
     * @param string $column
     * @param $value
     * @return $this
    */
    public function setValue(string $column, $value): static;







    /**
     * @param string $table
     * @return $this
    */
    public function update(string $table): static;








    /**
     * @param string $column
     * @param $value
     * @return $this
    */
    public function set(string $column, $value): static;





    /**
     * @param string $table
     * @param string $alias
     * @return $this
    */
    public function delete(string $table, string $alias = ''): static;







    /**
     * @param string $condition
     * @return $this
     */
    public function where(string $condition): static;






    /**
     * @param string $condition
     * @return $this
    */
    public function andWhere(string $condition): static;






    /**
     * @param string $condition
     * @return $this
    */
    public function orWhere(string $condition): static;







    /**
     * @param $id
     * @param $value
     * @return $this
    */
    public function setParameter($id, $value): static;






    /**
     * @param $id
     * @return mixed
    */
    public function getParameter($id): mixed;








    /**
     * @param array $parameters
     * @return $this
    */
    public function setParameters(array $parameters): static;






    /**
     * @return array
    */
    public function getParameters(): array;






    /**
     * Returns query string
     *
     * @return string
    */
    public function getSQL(): string;






    /**
     * @return mixed
    */
    public function getQuery(): mixed;
}
