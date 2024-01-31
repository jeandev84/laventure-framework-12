<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Set;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Set
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\Expr\Set
 */
class Set implements ExpressionInterface
{


    /**
     * @param array $set
    */
    public function __construct(public array $set)
    {
    }


    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return sprintf('SET %s', join(', ', $this->set));
    }
}