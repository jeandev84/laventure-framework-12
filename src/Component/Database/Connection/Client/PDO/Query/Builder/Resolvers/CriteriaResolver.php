<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query\Builder\Resolvers;

use Laventure\Component\Database\Connection\Query\Builder\Resolvers\CriteriaResolverInterface;
use Laventure\Component\Database\Query\Builder\SQL\Conditions\Contract\BuilderHasConditionInterface;
use Laventure\Component\Database\Query\Builder\SQL\Expr\Expr;

/**
 * PdoConditionResolver
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query\Builder\Resolvers
*/
class CriteriaResolver implements CriteriaResolverInterface
{

    /**
     * @param BuilderHasConditionInterface $qb
     * @param Expr $expr
    */
    public function __construct(
        protected BuilderHasConditionInterface $qb,
        protected Expr $expr
    )
    {
    }



    /**
     * @inheritDoc
    */
    public function resolve(array $criteria): mixed
    {
         foreach ($criteria as $column => $value) {
              if (is_array($value)) {
                  $this->qb->where(
                      strval($this->expr->in($column, "(:$column)"))
                  );
              } else {
                  $this->qb->andWhere(
                      strval($this->expr->eq($column, ":$column"))
                  );
              }
              $this->qb->setParameter($column, $value);
         }

         return $this->qb;
    }
}