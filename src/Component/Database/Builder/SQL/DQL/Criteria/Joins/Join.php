<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins;

use Laventure\Component\Database\Builder\SQL\Criteria;

/**
 * Joins
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins
*/
class Join implements Criteria
{


    /**
     * @param string $table
     * @param string $condition
    */
    public function __construct(
        public string $table,
        public string $condition
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
         return "JOIN $this->table ON $this->condition";
    }




    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'join';
    }
}