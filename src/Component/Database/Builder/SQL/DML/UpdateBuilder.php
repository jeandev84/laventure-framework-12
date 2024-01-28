<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML;

use Laventure\Component\Database\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Builder\SQL\Conditions\Traits\ConditionTrait;
use Laventure\Component\Database\Builder\SQL\DML\Contract\UpdateBuilderInterface;
use Laventure\Component\Database\Builder\SQL\Utils\QueryFormatter;

/**
 * UpdateBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
class UpdateBuilder implements UpdateBuilderInterface
{
      use BuilderTrait, ConditionTrait;


      /**
       * @var array
      */
      protected array $set = [];



      /**
       * @inheritDoc
      */
      public function update(array $attributes): static
      {
           foreach ($attributes as $column => $value) {
               $this->set($column, $value);
           }

           return $this;
      }




      /**
       * @inheritDoc
      */
      public function set($column, $value): static
      {
          $this->set[$column] = "$column = $value";

          return $this;
      }




     /**
      * @inheritDoc
     */
     public function getSQL(): string
     {
         $set   = sprintf('SET %s', join(', ', $this->set));
         $formatter = new QueryFormatter([
             sprintf("UPDATE %s %s", $this->getTable(), $set),
             $this->whereSQL()
         ]);

         return $formatter->format();
     }




    /**
     * @return bool
    */
    public function execute(): bool
    {
        $statement = $this->getQuery();

        return $statement->execute();
    }
}