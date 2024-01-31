<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Update;


use Laventure\Component\Database\Query\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Expr\Where;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Traits\ConditionTrait;
use Laventure\Component\Database\Query\Builder\SQL\Expr\Set\Set;
use Laventure\Component\Database\Query\Builder\SQL\Utils\QueryFormatter;

/**
 * UpdateBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Update
 */
class UpdateBuilder implements UpdateBuilderInterface
{

    use ConditionTrait;
    use BuilderTrait;

    public string $table;
    public array  $set = [];





    /**
     * @inheritDoc
    */
    public function update(string $table): static
    {
        $this->table = $table;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function set($column, $value): static
    {
        $this->set[$column] = "$column = $value";

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        $formatter = new QueryFormatter();
        return $formatter->withExpressions([
            new Update($this->table),
            new Set($this->set),
            new Where($this->wheres)
        ])->format();
    }
}
