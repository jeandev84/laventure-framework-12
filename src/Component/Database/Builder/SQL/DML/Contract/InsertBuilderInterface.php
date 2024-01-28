<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Contract;

/**
 * InserBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Contract
 */
interface InsertBuilderInterface
{

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
}
