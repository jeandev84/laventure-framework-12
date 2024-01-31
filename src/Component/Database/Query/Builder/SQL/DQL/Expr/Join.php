<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Join
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Expr\Join
*/
class Join implements ExpressionInterface
{
    /**
     * @param array $joins
    */
    public function __construct(public array $joins)
    {
    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return ($this->joins ? join(' ', $this->joins) : '');
    }




    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'joins';
    }
}
