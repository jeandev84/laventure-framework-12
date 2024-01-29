<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Factory;

use Laventure\Component\Database\Connection\Client\PDO\Drivers\Mysql\MysqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Oracle\OracleConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\PdoConnectionInterface;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Pgsql\PgsqlConnection;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\Sqlite\SqliteConnection;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;
use Laventure\Component\Database\Connection\Drivers\UnavailableDriverException;
use Laventure\Component\Database\Connection\Exception\ConnectionException;

/**
 * PdoConnectionFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\PDO\Factory
*/
class PdoConnectionFactory implements PdoConnectionFactoryInterface
{

    /**
     * @inheritDoc
    */
    public function createPdo(string $driver): PdoConnectionInterface
    {
        $client = new PdoClient();

        if (!$client->hasAvailableDriver($driver)) {
            throw new UnavailableDriverException($driver, [
                'from' => __METHOD__
            ]);
        }

        return match ($driver) {
            'mysql'  => new MysqlConnection($client),
            'pgsql'  => new PgsqlConnection($client),
            'oci'    => new OracleConnection($client),
            'sqlite' => new SqliteConnection($client),
            default  => $this->abort("Could not resolve instance of connection $driver")
        };
    }




    /**
     * @param string $message
     * @param int $code
     * @return void
     * @throws ConnectionException
    */
    private function abort(string $message, int $code = 500): void
    {
        throw new ConnectionException($message, [], $code);
    }
}