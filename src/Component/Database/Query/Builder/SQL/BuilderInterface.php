<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL;

use Laventure\Component\Database\Query\QueryInterface;
use Stringable;

/**
 * BuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
 */
interface BuilderInterface extends Stringable
{
    /**
     * @return string
    */
    public function getSQL(): string;






    /**
     * @param $id
     * @param $value
     * @param $type
     * @return $this
    */
    public function bindParam($id, $value, $type = null): static;






    /**
     * @param $id
     * @param $value
     * @return $this
    */
    public function setParameter($id, $value): static;






    /**
     * @param $id
     * @return mixed
    */
    public function getParameter($id): mixed;








    /**
     * @param array $parameters
     * @return $this
     */
    public function setParameters(array $parameters): static;






    /**
     * @return array
     */
    public function getParameters(): array;





    /**
     * @return QueryInterface
    */
    public function getQuery(): QueryInterface;
}
