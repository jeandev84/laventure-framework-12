<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria;

use Laventure\Component\Database\Builder\SQL\Criteria;
use Stringable;

/**
 * Selected
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Parts
*/
class Selected implements Criteria
{

    /**
     * @param array $columns
    */
    public function __construct(
        protected array $columns
    )
    {

    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        $selected =  join(', ', array_filter($this->columns));
        return empty($this->columns) ? "*" : $selected;
    }



    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'selected';
    }
}