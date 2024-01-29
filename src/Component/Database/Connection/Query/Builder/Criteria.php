<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Builder;

use Laventure\Component\Database\Builder\SQL\DML\Delete\DeleteCriteria;
use Laventure\Component\Database\Builder\SQL\DML\Insert\InsertCriteria;
use Laventure\Component\Database\Builder\SQL\DML\Update\UpdateCriteria;
use Laventure\Component\Database\Builder\SQL\DQL\SelectCriteria;

/**
 * Criteria
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Builder
 */
class Criteria
{
    private string $state = self::SELECT;

    const SELECT = 'select';
    const INSERT = 'insert';
    const UPDATE = 'update';
    const DELETE = 'delete';


    public SelectCriteria $select;
    public InsertCriteria $insert;
    public UpdateCriteria $update;
    public DeleteCriteria $delete;



    /**
     * @var array
    */
    public array $wheres = [];


    /**
     * @var array
    */
    public array $parameters = [];




    public function __construct()
    {
        $this->select  = new SelectCriteria();
        $this->insert  = new InsertCriteria();
        $this->update  = new UpdateCriteria();
        $this->delete  = new DeleteCriteria();
    }



    /**
     * @return SelectCriteria
    */
    public function select(): SelectCriteria
    {
        $this->state = self::SELECT;

        return $this->select;
    }




    /**
     * @param string ...$columns
    */
    public function addSelect(string ...$columns): static
    {
        $this->select->columns = array_merge(
            $this->select->columns,
            $columns
        );

        return $this;
    }





    /**
     * @return InsertCriteria
    */
    public function insert(): InsertCriteria
    {
        $this->state = self::INSERT;

        return $this->insert;
    }




    /**
     * @return UpdateCriteria
    */
    public function update(): UpdateCriteria
    {
        $this->state = self::UPDATE;

        return $this->update;
    }




    /**
     * @return DeleteCriteria
    */
    public function delete(): DeleteCriteria
    {
        $this->state = self::DELETE;

        return $this->delete;
    }





    /**
     * @return string
    */
    public function getState(): string
    {
        return $this->state;
    }
}