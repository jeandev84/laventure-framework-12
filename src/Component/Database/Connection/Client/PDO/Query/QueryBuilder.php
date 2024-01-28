<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Query;

use Laventure\Component\Database\Connection\Query\Builder\QueryBuilderInterface;
use Laventure\Component\Database\Connection\Query\Builder\Traits\QueryBuilderTrait;


/**
 * QueryBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Query
*/
class QueryBuilder implements QueryBuilderInterface
{
     use QueryBuilderTrait;

     /**
      * @var int
     */
     protected int $index = 0;


    /**
     * @inheritDoc
     */
    public function insert(string $table): static
    {
        $this->builder->insert($table);

        return $this;
    }





    /**
     * @inheritDoc
     */
    public function values(array $values): static
    {
        $builder = $this->builder->insert();

        if (!empty($values[0])) {
            foreach ($values as $attributes) {
                foreach ($attributes as $column => $value) {
                    $bindKey = ":{$column}_{$this->index}";
                    $builder->setValue($column, $bindKey);
                    $builder->setParameter($bindKey, $value);
                }
                $this->index++;
            }
        } else {
            $builder->values($values);
        }

        $this->builder->insert = $builder;

        return $this;
    }



    /**
     * @inheritDoc
    */
    public function setValue(string $column, $value): static
    {
        $this->builder->insert()->setValue($column, ":$column");

        $this->setParameter($column, $value);

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function set(string $column, $value): static
    {
        $builder = $this->builder->update();
        $builder->set($column, ":$column");
        $builder->setParameter($column, $value);

        return $this;
    }
}
