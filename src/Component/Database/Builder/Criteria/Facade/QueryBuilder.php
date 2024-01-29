<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\Criteria\Facade;

use Laventure\Component\Database\Builder\Criteria\CriteriaBuilder;

/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\Criteria\Facade
*/
class QueryBuilder
{
      public function __call(string $name, array $arguments)
      {
           $builder = new CriteriaBuilder();
           if (!method_exists($builder, $name)) {
               return false;
           }
           return call_user_func_array([$builder, $name], $arguments);
      }
}