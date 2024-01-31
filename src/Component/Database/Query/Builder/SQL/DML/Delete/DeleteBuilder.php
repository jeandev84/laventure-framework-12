<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Delete;

use Laventure\Component\Database\Query\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Expr\Where;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Traits\ConditionTrait;
use Laventure\Component\Database\Query\Builder\SQL\DML\Delete\Expr\Delete;
use Laventure\Component\Database\Query\Builder\Utils\QueryFormatter;

/**
 * DeleteBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Delete
*/
class DeleteBuilder implements DeleteBuilderInterface
{
    use ConditionTrait;
    use BuilderTrait;

    /**
     * @var string
    */
    public string $table;




    /**
     * @inheritDoc
    */
    public function delete(string $table): static
    {
        $this->table = $table;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        $formatter = new QueryFormatter();
        return $formatter->withExpressions([
            new Delete($this->table),
            new Where($this->wheres)
        ])->format();
    }
}
