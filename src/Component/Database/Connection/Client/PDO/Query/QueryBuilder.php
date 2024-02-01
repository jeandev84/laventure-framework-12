<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;


use Laventure\Component\Database\Connection\Client\PDO\Drivers\PdoConnectionInterface;
use Laventure\Component\Database\Connection\Client\PDO\Query\Builder\Resolvers\CriteriaResolver;
use Laventure\Component\Database\Connection\Client\PDO\Query\Builder\Resolvers\InsertResolver;
use Laventure\Component\Database\Connection\Query\Builder\AbstractQueryBuilder;
use Laventure\Component\Database\Query\Builder\SQL\DML\Delete\DeleteBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Insert\InsertBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DML\Update\UpdateBuilderInterface;
use Laventure\Component\Database\Query\Builder\SQL\DQL\Contract\SelectBuilderInterface;

/**
 * AbstractQueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
class QueryBuilder extends AbstractQueryBuilder
{


    /**
     * @param PdoConnectionInterface $connection
    */
    public function __construct(PdoConnectionInterface $connection)
    {
        parent::__construct($connection);
    }





    /**
     * @inheritDoc
    */
    public function select($selects = null, array $criteria = []): SelectBuilderInterface
    {
         $qb = $this->builder->select($selects);
         return $this->criteriaResolver($qb, $criteria);
    }




    /**
     * @inheritDoc
    */
    public function insert(string $table, array $attributes): InsertBuilderInterface
    {
        $qb = $this->builder->insert($table);
        $insertResolver = new InsertResolver($qb);
        return $insertResolver->resolve($attributes);
    }




    /**
     * @inheritDoc
    */
    public function update(string $table, array $attributes, array $criteria = []): UpdateBuilderInterface
    {
        $qb = $this->builder->update($table);

        foreach ($attributes as $column => $value) {
            $qb->set($column, ":$column");
            $qb->setParameter($column, $value);
        }

        return $this->criteriaResolver($qb, $criteria);
    }




    /**
     * @inheritDoc
    */
    public function delete(string $table, array $criteria = []): DeleteBuilderInterface
    {
         return $this->criteriaResolver(
             $this->builder->delete($table),
             $criteria
         );
    }




    /**
     * @param $qb
     * @param array $criteria
     * @return mixed
    */
    protected function criteriaResolver($qb, array $criteria): mixed
    {
        $criteriaResolver = new CriteriaResolver($qb, $this->expr());
        return $criteriaResolver->resolve($criteria);
    }
}
