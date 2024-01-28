<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL;

use Laventure\Component\Database\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Builder\SQL\Conditions\Contract\HasConditionInterface;
use Laventure\Component\Database\Builder\SQL\Conditions\Traits\ConditionTrait;
use Laventure\Component\Database\Builder\SQL\DQL\Contract\SelectBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Utils\QueryFormatter;

/**
 * SelectBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\Contract\DQL
*/
class SelectBuilder implements SelectBuilderInterface
{

    use SelectBuilderTrait, BuilderTrait, ConditionTrait;



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        $formatter = new QueryFormatter([
            $this->selectSQL(),
            $this->joinSQL(),
            $this->whereSQL(),
            $this->groupBySQL(),
            $this->havingSQL(),
            $this->orderBySQL(),
            $this->limitSQL()
        ]);

        return $formatter->format();
    }
}