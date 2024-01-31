<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Update;

use Laventure\Component\Database\Query\Builder\SQL\BuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract\HasConditionInterface;
use Laventure\Component\Database\Query\Builder\SQL\Set\SettableInterface;

/**
 * UpdateBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Update
 */
interface UpdateBuilderInterface extends SettableInterface, HasConditionInterface, BuilderInterface
{
    /**
     * @param string $table
     *
     * @return $this
    */
    public function update(string $table): static;
}
