<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria;

use Laventure\Component\Database\Builder\SQL\Criteria;

/**
 * OrderBy
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria
*/
class OrderBy implements Criteria
{


    public function __construct(
        public string $column,
        public string $direction = 'asc'
    )
    {
    }


    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'orderBy';
    }




    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return "$this->column ". strtoupper($this->direction);
    }
}