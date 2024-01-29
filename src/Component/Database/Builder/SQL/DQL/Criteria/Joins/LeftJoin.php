<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins;

/**
 * LeftJoin
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria\Joins
*/
class LeftJoin extends Join
{

    /**
     * @inheritdoc
    */
    public function __toString(): string
    {
        return "LEFT JOIN $this->table ON $this->condition";
    }




    /**
     * @inheritdoc
    */
    public function getName(): string
    {
        return 'leftJoin';
    }
}