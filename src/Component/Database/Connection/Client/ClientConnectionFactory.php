<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClient;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;

/**
 * ClientConnectionFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client
*/
class ClientConnectionFactory
{


     /**
      * @param string $name
      * @return ClientConnectionInterface
      * @throws ClientConnectionException
     */
     public function createClientConnection(string $name): ClientConnectionInterface
     {
          return match ($name) {
              'pdo'     => new PdoClient(),
              'mysqli'  => new MysqliClient(),
              'default' => throw new ClientConnectionException("Unavailable client $name")
          };
     }
}