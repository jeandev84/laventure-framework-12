<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * OrderBy
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Expr
*/
class OrderBy implements ExpressionInterface
{
    /**
     * @param array $orders
    */
    public function __construct(public array $orders)
    {
    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        if (!$this->orders) {
            return '';
        }

        return rtrim(sprintf('ORDER BY %s', join(',', $this->orders)));
    }
}
