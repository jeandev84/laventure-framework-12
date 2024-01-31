<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Insert\Expr;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Insert
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\DML\Insert\Expr
*/
class Insert implements ExpressionInterface
{

    /**
     * @param string $table
     * @param array $columns
     * @param array $values
    */
    public function __construct(
        public string $table,
        public array $columns,
        public array $values
    )
    {
    }




    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return sprintf(
    "INSERT INTO %s (%s) VALUES %s",
           $this->table,
           $this->columns(),
           $this->values()
        );
    }




    /**
     * @return string
    */
    private function columns(): string
    {
      return join(', ', $this->columns);
    }




    /**
     * @return string
    */
    private function values(): string
    {
        $format = [];

        foreach ($this->values as $values) {
            $format[] = '('. join(', ', array_values($values)) . ')';
        }

        return join(', ', $format);
    }
}