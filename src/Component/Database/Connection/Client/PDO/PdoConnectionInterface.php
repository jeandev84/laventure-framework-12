<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;


use Laventure\Component\Database\Connection\ConnectionInterface;
use PDO;

/**
 * PdoConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO
*/
interface PdoConnectionInterface extends ConnectionInterface
{

     /**
      * @return PDO
     */
     public function getConnection(): PDO;
}