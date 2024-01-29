<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder\Criteria;

/**
 * Select
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder\Criteria
 */
class Select
{
    /**
     * @var array
    */
    public array $columns = [];


    /**
     * @var array
    */
    public array $from = [];



    /**
     * @var string[]
    */
    public array $joins = [];



    /**
     * @var array
     */
    public array $groupBy = [];




    /**
     * @var string[]
     */
    public array $having = [];




    /**
     * @var string[]
     */
    public array $orderBy = [];



    /**
     * @var int
    */
    public int $offset = 0;




    /**s
     * @var int
    */
    public int $limit = 0;




    /**
     * @param array $columns
     * @return $this
    */
    public function addColumns(array $columns): static
    {
        $this->columns = array_merge($this->columns, $columns);

        return $this;
    }
}