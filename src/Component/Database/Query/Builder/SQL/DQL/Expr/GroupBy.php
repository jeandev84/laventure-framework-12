<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * GroupBy
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Expr
 */
class GroupBy implements ExpressionInterface
{
    public function __construct(public array $groupBy)
    {
    }





    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        if (empty($this->groupBy)) {
            return '';
        }

        return sprintf('GROUP BY %s', join($this->groupBy));
    }
}
