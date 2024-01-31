<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder\Resolvers;


use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilderInterface;

/**
 * InsertResolverInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder\Resolvers
 */
interface InsertResolverInterface
{

      /**
       * @param array $attributes
       * @return InsertBuilderInterface
      */
      public function resolve(array $attributes): InsertBuilderInterface;
}