<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Builder\SQL\DML;

use Laventure\Component\Database\Builder\SQL\BuilderTrait;
use Laventure\Component\Database\Builder\SQL\Conditions\Traits\ConditionTrait;
use Laventure\Component\Database\Builder\SQL\DML\Contract\DeleteBuilderInterface;

/**
 * DeleteBuilder
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Builder\SQL\DML
 */
class DeleteBuilder implements DeleteBuilderInterface
{
     use BuilderTrait, ConditionTrait;


     /**
      * @inheritDoc
     */
     public function delete(string $table): static
     {
         $this->table = $table;

         return $this;
     }



    /**
     * @inheritDoc
    */
    public function getSQL(): string
    {
        $sql[] = sprintf('DELETE FROM %s', $this->getTable());
        $sql[] = $this->whereSQL();

        return join(' ', array_filter($sql)) . ";";
    }





    /**
     * @return bool
    */
    public function execute(): bool
    {
        return $this->getQuery()->execute();
    }
}