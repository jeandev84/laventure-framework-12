<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClient;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;

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
     * @param string $extension
     * @param string $name
     * @return ConnectionInterface
     * @throws ExtensionException
    */
    public function make(
        string $extension,
        string $name
    ): ConnectionInterface
    {
        $client = match($extension) {
            'pdo'     => new PdoClient($name),
            'mysqli'  => new MysqliClient(),
            default   => throw new ExtensionException("Could not resolve extension $extension")
        };

        return $client->getConnection();
    }
}