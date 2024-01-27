<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Contract\DML;

use Laventure\Component\Database\Builder\SQL\Contract\BuilderInterface;

/**
 * InserBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
interface InsertBuilderInterface extends BuilderInterface
{
    /**
     * @param string $table
     * @return $this
     */
    public function insert(string $table): static;





    /**
     * @param array $values
     * @return $this
     */
    public function values(array $values): static;





    /**
     * @param $column
     * @param $value
     * @return $this
     */
    public function setValue($column, $value): static;





    /**
     * Returns insert query
     *
     * @return string
    */
    public function buildInsertQuery(): string;
}
