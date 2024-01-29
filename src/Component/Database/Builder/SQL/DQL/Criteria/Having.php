<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL\Criteria;

use Laventure\Component\Database\Builder\SQL\Criteria;

/**
 * Having
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL\Criteria
 */
class Having implements Criteria
{


    public function __construct(
        public string $condition
    )
    {
    }




    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'having';
    }



    /**
     * @inheritDoc
    */
    public function __toString(): string
    {
        return $this->condition;
    }
}