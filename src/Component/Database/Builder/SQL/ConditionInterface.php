<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL;

/**
 * ConditionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
*/
interface ConditionInterface
{
    /**
     * @param string $condition
     * @return $this
    */
    public function where(string $condition): static;





    /**
     * @param string $condition
     * @return $this
    */
    public function andWhere(string $condition): static;






    /**
     * @param string $condition
     * @return $this
    */
    public function orWhere(string $condition): static;








    /**
     * @param array $conditions
     * @return $this
    */
    public function criteria(array $conditions): static;






    /**
     * @return mixed
    */
    public function getWheres(): mixed;
}
