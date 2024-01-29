<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria;

use Laventure\Component\Database\Builder\SQL\Criteria;

/**
 * From
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Parts
 */
class From implements Criteria
{
   public function __construct(
       protected string $table,
       protected string $alias = ''
   )
   {
   }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return ($this->alias ? "$this->table $this->alias" : $this->table);
    }



    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'from';
    }
}