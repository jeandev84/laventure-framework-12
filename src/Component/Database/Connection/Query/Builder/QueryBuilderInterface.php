<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Query\Builder\SQL\DML\Delete\DeleteBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Update\UpdateBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Contract\SelectBuilderInterface;

/**
 * QueryBuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
 */
interface QueryBuilderInterface
{

     /**
      * @param $selects
      * @param array $criteria
      * @return SelectBuilderInterface
     */
     public function select($selects = null, array $criteria = []): SelectBuilderInterface;




     /**
      * @param string $table
      * @param array $attributes
      * @return InsertBuilderInterface
     */
     public function insert(string $table, array $attributes): InsertBuilderInterface;






     /**
      * @param string $table
      * @param array $attributes
      * @param array $criteria
      * @return UpdateBuilderInterface
     */
     public function update(string $table, array $attributes, array $criteria = []): UpdateBuilderInterface;







     /**
      * @param string $table
      * @param array $criteria
      * @return DeleteBuilderInterface
     */
     public function delete(string $table, array $criteria = []): DeleteBuilderInterface;
}
