<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DQL;

use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Query\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract\HasConditionInterface;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Expr\Where;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Traits\ConditionTrait;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Contract\SelectBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\From;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\GroupBy;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\Having;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\Join;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\Limit;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\OrderBy;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Expr\Select;
use Laventure\Component\Database\Query\Builder\SQL\Utils\QueryFormatter;

/**
 * SelectBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL
*/
class SelectBuilder implements SelectBuilderInterface
{
    use ConditionTrait;
    use BuilderTrait;


    /**
     * @var string[]
    */
    public array $columns = [];


    /**
     * @var string[]
    */
    public array $from = [];



    /**
     * @var string[]
    */
    public array $joins = [];



    /**
     * @var string[]
     */
    public array $groupBy = [];




    /**
     * @var string[]
    */
    public array $having = [];




    /**
     * @var string[]
     */
    public array $orderBy = [];



    /**
     * @var mixed
    */
    public $offset = null;




    /**
     * @var mixed
    */
    public $limit = null;





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
        $this->columns = array_merge($this->columns, $columns);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function from(string $from): static
    {
        $this->from[$from] = $from;

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
        return $this->addJoin("LEFT JOIN $table ON $condition");
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
        $this->joins[] = $join;

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
        $this->groupBy = array_merge($this->groupBy, $columns);

        return $this;
    }





    /**
     * @inheritDoc
    */
    public function having(string $condition): static
    {
        $this->having[] = $condition;

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
    public function addOrderBy(string ...$orders): static
    {
        $this->orderBy = array_merge($this->orderBy, $orders);

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function limit($limit): static
    {
        $this->limit = $limit;

        return $this;
    }







    /**
     * @inheritDoc
    */
    public function offset($offset): static
    {
        $this->offset = $offset;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        $formatter = new QueryFormatter();
        return $formatter->withExpressions([
            new Select($this->columns),
            new From($this->from),
            new Join($this->joins),
            new Where($this->wheres),
            new GroupBy($this->groupBy),
            new Having($this->having),
            new OrderBy($this->orderBy),
            new Limit($this->limit, $this->offset)
        ])->format();
    }
}
