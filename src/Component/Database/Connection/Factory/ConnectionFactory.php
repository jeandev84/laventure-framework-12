<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Factory;

use Laventure\Component\Database\Connection\Client\Mysqli\Drivers\MysqliConnectionInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\Factory\MysqliConnectionFactory;
use Laventure\Component\Database\Connection\Client\PDO\Drivers\PdoConnectionInterface;
use Laventure\Component\Database\Connection\Client\PDO\Factory\PdoConnectionFactory;
use Laventure\Component\Database\Connection\ConnectionInterface;
use Laventure\Component\Database\Connection\Drivers\UnavailableDriverException;
use Laventure\Component\Database\Connection\Exception\ConnectionException;

/**
 * ConnectionFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Factory
 */
class ConnectionFactory implements ConnectionFactoryInterface
{
    /**
     * @inheritdoc
     * @throws ConnectionException
     * @throws UnavailableDriverException
    */
    public function make(
        string $name,
        string $extension
    ): ConnectionInterface {
        return match($extension) {
            'pdo'     => $this->makeFromPdo($name),
            'mysqli'  => $this->makeFromMysqli(),
            default   => $this->abort("Could not resolve connection for extension $extension")
        };
    }







    /**
     * @param string $name
     * @return PdoConnectionInterface
     * @throws UnavailableDriverException
    */
    public function makeFromPdo(string $name): PdoConnectionInterface
    {
        return (new PdoConnectionFactory())->create($name);
    }




    /**
     * @return MysqliConnectionInterface
    */
    public function makeFromMysqli(): MysqliConnectionInterface
    {
        return (new MysqliConnectionFactory())->create();
    }





    /**
     * @param string $message
     * @return void
     * @throws ConnectionException
    */
    private function abort(string $message): void
    {
        throw new ConnectionException($message);
    }

}
