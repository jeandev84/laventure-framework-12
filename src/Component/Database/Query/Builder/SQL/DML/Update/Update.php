<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder\SQL\DML\Update;

use Laventure\Component\Database\Query\Builder\SQL\Expr\ExpressionInterface;

/**
 * Update
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder\SQL\DML\Update
 */
class Update implements ExpressionInterface
{


    /**
     * @param string $table
    */
    public function __construct(public string $table)
    {
    }





    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'update';
    }



    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf("UPDATE %s", $this->table);
    }
}