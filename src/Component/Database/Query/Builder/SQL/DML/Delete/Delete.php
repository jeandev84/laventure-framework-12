<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Delete;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Delete
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\DML\Delete
*/
class Delete implements ExpressionInterface
{
     public function __construct(public string $table)
     {
     }




     /**
      * @inheritDoc
     */
     public function getName(): string
     {
        return 'delete';
     }




     /**
      * @inheritDoc
     */
     public function __toString(): string
     {
         return sprintf('DELETE FROM %s', $this->table);
     }
}