<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Contract\DML;

/**
 * DeleteBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
interface DeleteBuilderInterface
{
    /**
     * @param string $table
     * @return $this
    */
    public function delete(string $table): static;
}
