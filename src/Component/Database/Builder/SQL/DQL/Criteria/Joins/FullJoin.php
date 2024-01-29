<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins;

/**
 * FullJoin
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins
 */
class FullJoin extends Join
{
    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return "FULL JOIN $this->table ON $this->condition";
    }



    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'fullJoin';
    }
}