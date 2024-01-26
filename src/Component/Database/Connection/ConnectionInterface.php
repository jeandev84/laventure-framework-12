<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection;


/**
 * ConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
*/
interface ConnectionInterface extends ConnectableInterface
{

     /**
      * Returns the name of connection
      *
      * @return string
     */
     public function getName(): string;






     /**
      * @param string $sql
      *
      * @return mixed
     */
     public function statement(string $sql): mixed;





     /**
      * Returns instance of query
      *
      * @return mixed
     */
     public function createQuery(): mixed;






     /**
      * Returns instance of query builder
      *
      * @return mixed
     */
     public function createQueryBuilder(): mixed;
}