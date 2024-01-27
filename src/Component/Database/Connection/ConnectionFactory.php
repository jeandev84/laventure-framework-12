<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClient;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;
use Laventure\Component\Database\Connection\Drivers\UnavailableDriverException;

/**
 * ConnectionFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
 */
class ConnectionFactory
{
    /**
     * @param string $name
     * @param string $extension
     * @return ConnectionInterface
     * @throws ExtensionException
     * @throws UnavailableDriverException
    */
    public function make(
        string $name,
        string $extension
    ): ConnectionInterface {
        $client    = match($extension) {
            'pdo'     => new PdoClient($name),
            'mysqli'  => new MysqliClient(),
            default   => throw new ExtensionException("Could not resolve connection for extension $extension")
        };

        return $client->createConnection();
    }
}
