<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query\Builder\Resolvers;

use Laventure\Component\Database\Connection\Query\Builder\Resolvers\InsertResolverInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilderInterface;

/**
 * InsertResolver
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query\Builder\Resolvers
 */
class InsertResolver implements InsertResolverInterface
{

    public function __construct(protected InsertBuilderInterface $qb)
    {
    }



    /**
     * @inheritDoc
    */
    public function resolve(array $attributes): InsertBuilderInterface
    {
        if (isset($attributes[0])) {
            foreach ($attributes as $position => $values) {
                foreach ($values as $column => $value) {
                    $this->qb->setValue($column, ":{$column}_{$position}", $position);
                    $this->qb->setParameter("{$column}_{$position}", $value);
                }
            }
        } else {
            foreach ($attributes as $column => $value) {
                $this->qb->setValue($column, ":$column");
                $this->qb->setParameter($column, $value);
            }
        }

        return $this->qb;
    }
}