<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder\Resolvers;


use Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract\BuilderHasConditionInterface;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract\HasConditionInterface;

/**
 * ConditionResolverInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder\Resolvers
*/
interface CriteriaResolverInterface
{
      /**
       * @param array $criteria
       * @return mixed
      */
      public function resolve(array $criteria): mixed;
}