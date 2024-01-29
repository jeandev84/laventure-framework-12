<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins;

/**
 * RightJoin
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins
 */
class RightJoin extends Join
{
    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return "RIGHT JOIN $this->table ON $this->condition";
    }


    /**
     * @inheritdoc
    */
    public function getName(): string
    {
        return 'rightJoin';
    }
}