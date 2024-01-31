<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\Expr\Utils;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * andX
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\Expr\Utils
 */
class andX implements ExpressionInterface
{

    /**
     * @var array
    */
    protected array $conditions = [];




    /**
     * @param array $conditions
    */
    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }





    /**
     * @inheritdoc
    */
    public function __toString(): string
    {
        return join(" AND ", $this->conditions);
    }
}