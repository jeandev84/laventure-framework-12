<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Expr;

use Laventure\Component\Database\Builder\SQL\Criteria;
use Laventure\Component\Database\Builder\SQL\Expr\Contract\ExpressionInterface;

/**
 * Limit
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Expr
*/
class Limit implements ExpressionInterface
{


     /**
      * @param int $limit
      * @param int $offset
     */
     public function __construct(public int $limit, public int $offset = 0)
     {
     }




     /**
      * @inheritDoc
     */
     public function __toString(): string
     {
         if (! $this->limit) { return ''; }

         $limit = "LIMIT $this->limit";

         return ($this->offset ? "$limit OFFSET $this->offset" : $limit);
     }





     /**
      * @inheritDoc
     */
     public function getName(): string
     {
        return 'limit';
     }
}