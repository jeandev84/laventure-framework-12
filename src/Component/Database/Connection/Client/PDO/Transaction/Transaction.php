<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Transaction;

use Laventure\Component\Database\Connection\Transaction\TransactionInterface;
use PDO;
use PDOException;

/**
 * Transaction
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Transaction
*/
class Transaction implements TransactionInterface
{


      /**
       * @param PDO $pdo
      */
      public function __construct(protected PDO $pdo)
      {
      }



      /**
       * @inheritDoc
      */
      public function beginTransaction(): bool
      {
          return $this->pdo->beginTransaction();
      }




      /**
       * @inheritDoc
      */
      public function hasActiveTransaction(): bool
      {
          return $this->pdo->inTransaction();
      }




      /**
       * @inheritDoc
      */
      public function commit(): bool
      {
          return $this->pdo->commit();
      }




      /**
       * @inheritDoc
      */
      public function rollback(): bool
      {
          return $this->pdo->rollBack();
      }




      /**
       * @inheritDoc
      */
      public function transaction(callable $func): bool
      {
          $this->beginTransaction();

          try {

              $func($this);
              return $this->commit();

          } catch (PDOException $e) {

              if ($this->hasActiveTransaction()) {
                  $this->rollBack();
              }

              throw new PDOException($e->getMessage(), $e->getCode());
          }
      }
}