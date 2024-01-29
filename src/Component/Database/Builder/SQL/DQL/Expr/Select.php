<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Builder\SQL\Expr\Contract\ExpressionInterface;


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
     * @param array $from
    */
    public function __construct(
        public array $columns,
        public array $from
    )
    {

    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        $selected =  join(', ', array_filter($this->columns));
        $selects  =  !empty($this->columns) ? $selected : "*";
        $from     =  new From($this->from);

        return "SELECT $selects FROM {$from}";
    }





    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'selected';
    }
}