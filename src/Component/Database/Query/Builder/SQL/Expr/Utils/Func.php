<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Expr\Utils;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Func
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\Expr\Utils
*/
class Func implements ExpressionInterface
{

    /**
     * @param string $function
    */
    public function __construct(protected string $function)
    {
    }


    /**
     * @return string
    */
    public function __toString(): string
    {
        return $this->function;
    }
}