<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria;

use Laventure\Component\Database\Builder\SQL\Criteria;

/**
 * Limit
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria
*/
class Limit implements Criteria
{
     /**
      * @param string $limit
     */
     public function __construct(
         public string $limit
     )
     {
     }



     /**
      * @inheritDoc
     */
     public function getName(): string
     {
        return 'limit';
     }




     /**
      * @inheritDoc
     */
     public function __toString(): string
     {
        return $this->limit;
     }
}