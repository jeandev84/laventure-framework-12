<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Contract\DML;

use Laventure\Component\Database\Builder\SQL\Contract\SettableInterface;

/**
 * UpdateBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
interface UpdateBuilderInterface extends SettableInterface
{
    /**
     * @param string $table
     * @return $this
    */
    public function update(string $table): static;





    /**
     * Returns update query
     *
     * @return string
    */
    public function buildUpdateQuery(): string;
}
