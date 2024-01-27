<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Traits\DML;

/**
 * InsertBuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Traits
 */
trait InsertBuilderTrait
{


    /**
     * @var array
     */
    protected array $insertQuery = [];



    /**
     * @param string $table
     * @param string $alias
     * @return $this
    */
    public function update(string $table, string $alias = ''): static
    {
        $this->insertQuery[] = "$table $alias";

        return $this;
    }



    /**
     * Returns insert query
     *
     * @return string
    */
    abstract public function buildInsertQuery(): string;
}
