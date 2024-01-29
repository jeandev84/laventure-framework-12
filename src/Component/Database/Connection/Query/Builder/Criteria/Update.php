<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder\Criteria;

/**
 * Update
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder\Criteria
 */
class Update
{


    /**
     * @var string
    */
    public string $table = '';




    /**
     * @var array
    */
    public array $set = [];
}