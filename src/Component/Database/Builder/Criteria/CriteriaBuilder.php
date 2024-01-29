<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\Criteria;


use Laventure\Component\Database\Builder\SQL\Conditions\Expr\Where;
use Laventure\Component\Database\Builder\SQL\DQL\Expr\GroupBy;
use Laventure\Component\Database\Builder\SQL\DQL\Expr\Having;
use Laventure\Component\Database\Builder\SQL\DQL\Expr\Join;
use Laventure\Component\Database\Builder\SQL\DQL\Expr\Limit;
use Laventure\Component\Database\Builder\SQL\DQL\Expr\OrderBy;
use Laventure\Component\Database\Builder\SQL\DQL\Expr\Select;
use Laventure\Component\Database\Builder\SQL\Utils\QueryFormatter;
use Laventure\Component\Database\Connection\Query\Builder\Criteria;
use Stringable;

/**
 * CriteriaBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\Criteria
*/
class CriteriaBuilder extends Stringable
{
    /**
     * @var Criteria
     */
    protected Criteria $criteria;


    /**
     * @var QueryFormatter
     */
    protected QueryFormatter $formatter;



    public function __construct()
    {
        $this->criteria  = new Criteria();
        $this->formatter = new QueryFormatter();
    }




    /**
     * @inheritDoc
     */
    public function select(string ...$columns): static
    {
        return $this->addSelect(...$columns);
    }




    /**
     * @inheritDoc
     */
    public function addSelect(string ...$columns): static
    {
        $this->criteria->addSelect(...$columns);

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function from(string $table, string $alias = null): static
    {
        $table = ($alias ? "$table $alias" : $table);

        $this->criteria->select()->from[$table] = $table;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function join(string $table, string $condition): static
    {
        return $this->addJoin("JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function leftJoin(string $table, string $condition): static
    {
        return $this->addJoin("LEFT $table ON $condition");
    }





    /**
     * @inheritDoc
     */
    public function rightJoin(string $table, string $condition): static
    {
        return $this->addJoin("RIGHT JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function innerJoin(string $table, string $condition): static
    {
        return $this->addJoin("INNER JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function fullJoin(string $table, string $condition): static
    {
        return $this->addJoin("FULL JOIN $table ON $condition");
    }




    /**
     * @inheritDoc
     */
    public function addJoin(string $join): static
    {
        $this->criteria->select()->joins[] = $join;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function groupBy(string ...$columns): static
    {
        return $this->addGroupBy(...$columns);
    }




    /**
     * @inheritDoc
     */
    public function addGroupBy(string ...$columns): static
    {
        $this->criteria->select()->groupBy[] = join(', ', $columns);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function having(string $condition): static
    {
        $this->criteria->select()->having[] = $condition;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function andHaving(string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orHaving(string $condition): static
    {
        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orderBy(string $column, string $direction = 'asc'): static
    {
        return $this->addOrderBy("$column $direction");
    }




    /**
     * @inheritDoc
     */
    public function addOrderBy(string $orderBy): static
    {
        $this->criteria->select()->orderBy[] = $orderBy;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function setMaxResults(int $limit): static
    {
        $this->criteria->select()->limit = $limit;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function setFirstResult(int $offset): static
    {
        $this->criteria->select()->offset = $offset;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function insert(string $table): static
    {
        $this->criteria->insert()->table = $table;

        return $this;
    }






    /**
     * @inheritDoc
     */
    public function values(array $values): static
    {
        #$this->criteria->insert()->values = $values;
        foreach ($values as $column => $value) {
            $this->setValue($column, $value);
        }

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function setValue(string $column, $value): static
    {
        $this->criteria->insert->columns[$column] = $column;
        $this->criteria->insert()->values[$column] = $value;

        return $this;
    }







    /**
     * @inheritDoc
     */
    public function update(string $table): static
    {
        $this->criteria->update()->table = $table;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function set(string $column, $value): static
    {
        $this->criteria->update()->set[$column] = $value;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function delete(string $table): static
    {
        $this->criteria->delete()->table = $table;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function where(string $condition): static
    {
        return $this->andWhere($condition);
    }




    /**
     * @inheritDoc
     */
    public function andWhere(string $condition): static
    {
        $this->criteria->wheres['AND'][] = $condition;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function orWhere(string $condition): static
    {
        $this->criteria->wheres['OR'][] = $condition;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function setParameter($id, $value): static
    {
        $this->criteria->parameters[$id] = $value;

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function getParameter($id): mixed
    {
        return $this->criteria->parameters[$id] ?? null;
    }




    /**
     * @inheritDoc
     */
    public function setParameters(array $parameters): static
    {
        foreach ($parameters as $id => $value) {
            $this->setParameter($id, $value);
        }

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return $this->criteria->parameters;
    }




    /**
     * @inheritDoc
     */
    public function getCriteria(): Criteria
    {
        return $this->criteria;
    }




    /**
     * @inheritDoc
     */
    public function getSQL(): string
    {
        return match($this->criteria->getState()) {
            Criteria::SELECT => $this->buildSelectQuery(),
            Criteria::INSERT => $this->buildInsertQuery(),
            Criteria::UPDATE => $this->buildUpdateQuery(),
            Criteria::DELETE => $this->buildDeleteQuery()
        };
    }






    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getSQL();
    }





    /**
     * @return string
     */
    protected function buildSelectQuery(): string
    {
        $columns = $this->criteria->select->columns;
        $from    = $this->criteria->select->from;
        $limit   = $this->criteria->select->limit;
        $offset  = $this->criteria->select->offset;

        $format = $this->formatter->withExpressions([
            new Select($columns, $from),
            new Join($this->criteria->select->joins),
            new Where($this->criteria->wheres),
            new GroupBy($this->criteria->select->groupBy),
            new Having($this->criteria->select->having),
            new OrderBy($this->criteria->select->orderBy),
            new Limit($limit, $offset)
        ])->format();

        $this->formatter->clear();
        return $format;
    }





    /**
     * @return string
     */
    protected function buildInsertQuery(): string
    {
        return '';
    }





    /**
     * @return string
     */
    protected function buildUpdateQuery(): string
    {
        return '';
    }





    /**
     * @return string
     */
    protected function buildDeleteQuery(): string
    {
        return '';
    }
}