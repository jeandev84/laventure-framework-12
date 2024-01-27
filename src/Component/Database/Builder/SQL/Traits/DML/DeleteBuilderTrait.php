<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\Traits\DML;

/**
 * DeleteBuilderTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Traits
 */
trait DeleteBuilderTrait
{
    /**
     * Returns delete query
     *
     * @return string
    */
    abstract public function buildDeleteQuery(): string;
}
