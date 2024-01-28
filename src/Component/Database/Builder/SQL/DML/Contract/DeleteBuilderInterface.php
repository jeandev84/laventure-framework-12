<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Contract;

use Laventure\Component\Database\Builder\SQL\BuilderInterface;
use Laventure\Component\Database\Builder\SQL\Conditions\Contract\HasConditionInterface;

/**
 * DeleteBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Contract
 */
interface DeleteBuilderInterface extends HasConditionInterface, BuilderInterface
{
    /**
     * @param string $table
     *
     * @return $this
    */
    public function delete(string $table): static;
}
