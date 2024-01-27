<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO;

use Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Oracle\OracleConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Pgsql\PgsqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Sqlite\SqliteConnection;

/**
 * PdoConnectionFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO
*/
class PdoConnectionFactory
{

     /**
      * @param PdoClientInterface $client
      *
      * @return PdoConnectionInterface
     */
     public function makeConnection(PdoClientInterface $client): PdoConnectionInterface
     {
        $driver = $client->getDriver();

        return match($driver) {
           'mysql'  => new MysqlConnection($client) ,
           'pgsql'  => new PgsqlConnection($client),
           'sqlite' => new SqliteConnection($client),
           'oci'    => new OracleConnection($client),
        };
     }
}