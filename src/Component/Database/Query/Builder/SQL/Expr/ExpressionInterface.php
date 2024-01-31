<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Expr;

use Stringable;

/**
 * ExpressionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\Expr\Contract
*/
interface ExpressionInterface extends Stringable
{
    /**
     * @return string
    */
    public function getName(): string;
}
