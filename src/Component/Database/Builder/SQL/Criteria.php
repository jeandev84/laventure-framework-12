<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL;

use Stringable;

/**
 * Criteria
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
*/
interface Criteria extends Stringable
{
     /**
      * Returns name of criteria
      *
      * @return string
     */
     public function getName(): string;
}