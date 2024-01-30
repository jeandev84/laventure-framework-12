<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DQL;

use Laventure\Component\Database\Builder\SQL\DQL\Contract\SelectBuilderInterface;

/**
 * SelectBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DQL
 */
class SelectBuilder implements SelectBuilderInterface
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




    /**
     * @var int
    */
    public int $limit = 0;
}