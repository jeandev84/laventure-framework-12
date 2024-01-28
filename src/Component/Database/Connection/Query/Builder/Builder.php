<?php

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Builder\SQL\BuilderInterface;
use Laventure\Component\Database\Builder\SQL\Conditions\Contract\HasConditionInterface;
use Laventure\Component\Database\Builder\SQL\DML\DeleteBuilder;
use Laventure\Component\Database\Builder\SQL\DML\InsertBuilder;
use Laventure\Component\Database\Builder\SQL\DML\UpdateBuilder;
use Laventure\Component\Database\Builder\SQL\DQL\SelectBuilder;
use Laventure\Component\Database\Connection\ConnectionInterface;

/**
 * Builder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
 */
class Builder
{
    public SelectBuilder $select;
    public UpdateBuilder $update;
    public InsertBuilder $insert;
    public DeleteBuilder $delete;


    const SELECT = 'select';
    const INSERT = 'insert';
    const UPDATE = 'update';
    const DELETE = 'delete';
    
    
    /**
     * @var string 
    */
    public string $state = self::SELECT;



    /**
     * @var array
    */
    private array $conditions     = [];
    private array $conditionTypes = ['and', 'or'];
    private array $parameters     = [];

    
    
    /**
     * @param ConnectionInterface $connection
    */
    public function __construct(ConnectionInterface $connection)
    {
        $this->select = new SelectBuilder($connection);
        $this->insert = new InsertBuilder($connection);
        $this->update = new UpdateBuilder($connection);
        $this->delete = new DeleteBuilder($connection);
    }




    /**
     * @param string $state
     *
     * @return $this
    */
    public function addState(string $state): static
    {
        $this->state = $state;

        return $this;
    }




    /**
     * @return SelectBuilder
    */
    public function select(): SelectBuilder
    {
        $this->addState(self::SELECT);

        return $this->select;
    }




    /**
     * @param string $table
     * @return InsertBuilder
    */
    public function insert(string $table = ''): InsertBuilder
    {
        $this->addState(self::INSERT);

        if ($table) {
            $this->insert->table($table);
        }

        return $this->insert;
    }





    /**
     * @return UpdateBuilder
    */
    public function update(): UpdateBuilder
    {
        $this->addState(self::UPDATE);

        return $this->update;
    }





    /**
     * @return DeleteBuilder
    */
    public function delete(): DeleteBuilder
    {
        $this->addState(self::DELETE);

        return $this->delete;
    }





    /**
     * @param string $type
     * @param string $condition
     * @return $this
    */
    public function condition(string $type, string $condition): static
    {
        $type = strtolower($type);

        if (!in_array($type, $this->conditionTypes)) {
           throw new \InvalidArgumentException("unavailable type $type");
        }

        $this->conditions[$type][] = $condition;

        return $this;
    }




    /**
     * @param string $condition
     * @return $this
    */
    public function andWhere(string $condition): static
    {
        $this->condition('and', $condition);

        return $this;
    }




    /**
     * @param string $condition
     * @return $this
    */
    public function orWhere(string $condition): static
    {
        $this->condition('or', $condition);

        return $this;
    }




    /**
     * @param array $parameters
     * @return $this
    */
    public function setParameters(array $parameters): static
    {
        $this->parameters = array_merge($this->parameters, $parameters);

        return $this;
    }





    /**
     * @param $id
     * @return mixed
    */
    public function getParameter($id): mixed
    {
        return $this->getBuilder()->getParameter($id);
    }





    /**
     * @return array
    */
    public function getParameters(): array
    {
        return $this->getBuilder()->getParameters();
    }






    /**
     * @return BuilderInterface
    */
    public function getBuilder(): BuilderInterface
    {
        $builder = match($this->state) {
            self::SELECT => $this->select,
            self::INSERT => $this->insert,
            self::UPDATE => $this->update,
            self::DELETE => $this->delete
        };

        return $this->resolve($builder);
    }
    
    


    /**
     * @return string
    */
    public function getSQL(): string
    {
        return $this->getBuilder()->getSQL();
    }







    /**
     * @param BuilderInterface $builder
     * @return BuilderInterface
    */
    private function resolve(BuilderInterface $builder): BuilderInterface
    {
         if ($builder instanceof HasConditionInterface) {
             foreach ($this->conditionTypes as $type) {
                 if (!empty($this->conditions[$type])) {
                     foreach ($this->conditions[$type] as $condition) {
                         call_user_func([$builder, "{$type}Where"], $condition);
                     }
                 }
             }
         }


         if (!empty($this->parameters)) {
             $builder->setParameters($this->parameters);
         }

         return $builder;
    }
}