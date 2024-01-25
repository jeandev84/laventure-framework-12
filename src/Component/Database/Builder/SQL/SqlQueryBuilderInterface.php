<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL;

use Laventure\Component\Database\Builder\SQL\DML\DeleteBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\InsertBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DML\UpdateBuilderInterface;
use Laventure\Component\Database\Builder\SQL\DQL\SelectBuilderInterface;

/**
 * SqlQueryBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL
 */
interface SqlQueryBuilderInterface
{
    /**
     * @param string ...$columns
     *
     * @return SelectBuilderInterface
     */
    public function select(string ...$columns): SelectBuilderInterface;






    /**
     * @param string $table
     * @return InsertBuilderInterface
    */
    public function insert(string $table): InsertBuilderInterface;







    /**
     * @param string $table
     * @return UpdateBuilderInterface
    */
    public function update(string $table): UpdateBuilderInterface;






    /**
     * @param string $table
     * @return DeleteBuilderInterface
    */
    public function delete(string $table): DeleteBuilderInterface;
}
