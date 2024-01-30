<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Update;

/**
 * UpdateBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Update
 */
class UpdateBuilder implements UpdateBuilderInterface
{
    public string $table;
    public array $set = [];



    /**
     * @inheritDoc
    */
    public function update(array $attributes): static
    {

    }



    /**
     * @inheritDoc
    */
    public function set($column, $value): static
    {

    }
}