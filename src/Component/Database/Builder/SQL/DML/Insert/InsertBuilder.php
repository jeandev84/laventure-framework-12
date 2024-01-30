<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML\Insert;

/**
 * InsertBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Insert
 */
class InsertBuilder implements InsertBuilderInterface
{

    /**
     * @var array
    */
    public array $columns = [];
    public array $values  = [];



    /**
     * @inheritDoc
    */
    public function insert(array $attributes): static
    {

    }
}