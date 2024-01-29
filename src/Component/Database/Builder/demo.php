<?php
namespace Laventure\Component\Database\Builder;

class Criteria
{
    public $select;
    public $where;
    public $from;
    public $limit;
}


class CriteriaBuilder
{
     protected $criteria;

     public function __construct(Criteria $criteria)
     {
         $this->criteria = $criteria;
     }


     public function select($field): static
     {
         $this->criteria->select = $field;

         return $this;
     }


     public function from(string $table): static
     {
         $this->criteria->from = $table;

         return $this;
     }


     public function condition($condition): static
     {
         $this->criteria->where = $condition;

         return $this;
     }



     public function limit($limit): static
     {
         $this->criteria->limit = $limit;

         return $this;
     }


    /**
     * @return Criteria
     */
    public function getCriteria(): Criteria
    {
        return $this->criteria;
    }
}

$criteria = (new CriteriaBuilder(
   new Criteria()
));

$r = $criteria->select('*')
              ->from('users')
              ->condition('id = 1')
              ->limit(10)
              ->getCriteria();