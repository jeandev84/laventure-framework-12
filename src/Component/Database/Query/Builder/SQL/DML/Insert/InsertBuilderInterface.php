<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Insert;

use Laventure\Component\Database\Query\Builder\SQL\BuilderInterface;

/**
 * InserBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML\Insert
*/
interface InsertBuilderInterface extends BuilderInterface
{


    /**
     * @param string $table
     *
     * @return $this
    */
    public function insert(string $table): static;





    /**
     * @param array $values
     * @return $this
    */
    public function values(array $values): static;




    /**
     * @param string $column
     * @param $value
     * @param int $index
     * @return $this
    */
    public function setValue(string $column, $value, int $index = 0): static;
}
