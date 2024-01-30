<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Expr;


use Laventure\Component\Database\Builder\SQL\Expr\Contract\ExpressionInterface;

/**
 * From
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Parts
 */
class From implements ExpressionInterface
{

   public function __construct(public array $from)
   {
   }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return join(', ', array_values($this->from));
    }




    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'from';
    }
}