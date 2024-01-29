<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL;

/**
 * SelectCriteria
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL
 */
class SelectCriteria
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
}