<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Query\Builder;


use Laventure\Component\Database\Query\Builder\SQL\DML\Delete\DeleteBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Update\UpdateBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Contract\SelectBuilderInterface;

/**
 * SqlQueryBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Query\Builder
 */
interface SqlQueryBuilderInterface
{

     /**
       * @param string ...$selects
       * @return SelectBuilderInterface
     */
     public function select(string ...$selects): SelectBuilderInterface;




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