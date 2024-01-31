<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use mysqli;

/**
 * MysqliClient
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli
 */
class MysqliClient implements MysqliClientInterface
{
    /**
     * @inheritDoc
    */
    public function makeConnection(ConfigurationInterface $config): mysqli
    {
        return new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database']
        );
    }



    /**
     * @inheritDoc
    */
    public function getName(): string
    {
        return 'mysqli';
    }
}
