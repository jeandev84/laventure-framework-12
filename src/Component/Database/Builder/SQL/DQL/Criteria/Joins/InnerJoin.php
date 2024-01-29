<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins;

/**
 * InnerJoin
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins
*/
class InnerJoin extends Join
{

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return "INNER JOIN $this->table ON $this->condition";
    }

    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'innerJoin';
    }
}