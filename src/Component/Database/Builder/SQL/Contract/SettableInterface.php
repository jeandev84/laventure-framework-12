<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Contract;

/**
 * SettableInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
*/
interface SettableInterface
{
    /**
     * @param string $column
     * @param $value
     * @return $this
    */
    public function set(string $column, $value): static;
}
