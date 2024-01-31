<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Selected
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Parts
*/
class Select implements ExpressionInterface
{
    /**
     * @param array $columns
    */
    public function __construct(public array $columns)
    {

    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        $selected =  join(', ', array_filter($this->columns));
        $selects  =  !empty($this->columns) ? $selected : "*";

        return "SELECT $selects";
    }
}
