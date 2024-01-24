<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClient;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;
use Laventure\Component\Database\Connection\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Drivers\Oracle\OracleConnection;
use Laventure\Component\Database\Connection\Drivers\Pgsql\PgsqlConnection;
use Laventure\Component\Database\Connection\Drivers\Sqlite\SqliteConnection;
use Laventure\Component\Database\Manager\ExtensionException;

/**
 * ConnectionStack
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
 */
class ConnectionStack
{

       /**
        * @param string $extension
        * @return array
       */
       public static function connections(string $extension = 'pdo'): array
       {

            $client = match($extension) {
                'pdo'     => new PdoClient(),
                'mysqli'  => new MysqliClient(),
                default   => throw new ExtensionException("Could not resolve extension $extension")
            };

            return self::get($extension, $client);
       }




       /**
        * @param string $extension
        * @param ClientConnectionInterface $client
        * @return array
       */
       private static function get(string $extension, ClientConnectionInterface $client): array
       {
            return [
               'mysqli' => [new MysqlConnection($client)],
               'pdo'    => [
                   new MysqlConnection($client),
                   new PgsqlConnection($client),
                   new SqliteConnection($client),
                   new OracleConnection($client)
               ]
            ][$extension] ?? [];
       }
}