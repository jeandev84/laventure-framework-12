<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Insert;

/**
 * InserBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Insert
*/
interface InsertBuilderInterface
{

    /**
     * @param array $attributes
     * @return $this
    */
    public function insert(array $attributes): static;
}