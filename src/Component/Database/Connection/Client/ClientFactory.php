<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClient;
use Laventure\Component\Database\Connection\Client\PDO\PdoClient;

/**
 * ClientFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Extensions
*/
class ClientFactory implements ClientFactoryInterface
{

    /**
     * @inheritDoc
    */
    public function createClient(string $name): ClientInterface
    {
        return match ($name) {
            'pdo'    => new PdoClient(),
            'mysqli' => new MysqliClient(),
            default  => throw new ClientException("Could not resolve client ($name)")
        };
    }
}