<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Builder\SQL\Expr\Contract\ExpressionInterface;

/**
 * Joins
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Expr\Joins
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
        return 'join';
    }
}