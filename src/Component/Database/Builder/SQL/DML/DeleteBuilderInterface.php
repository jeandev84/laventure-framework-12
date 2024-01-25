<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML;

use Laventure\Component\Database\Builder\SQL\BuilderInterface;

/**
 * DeleteBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
interface DeleteBuilderInterface extends BuilderInterface
{
    /**
     * @param string $table
     * @param string $alias
     * @return $this
    */
    public function delete(string $table, string $alias = ''): static;
}
