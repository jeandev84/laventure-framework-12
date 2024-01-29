<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria;

use Laventure\Component\Database\Builder\SQL\Criteria;

/**
 * GroupBy
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria
 */
class GroupBy implements Criteria
{


    public function __construct(
        public string $column
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'groupBy';
    }




    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return $this->column;
    }
}