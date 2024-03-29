<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Factory;

use Laventure\Component\Database\Connection\Client\Mysqli\Drivers\MysqliConnection;
use Laventure\Component\Database\Connection\Client\Mysqli\Drivers\MysqliConnectionInterface;
use Laventure\Component\Database\Connection\Client\Mysqli\MysqliClient;

/**
 * MysqliConnectionFactory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Factory
 */
class MysqliConnectionFactory implements MysqliConnectionFactoryInterface
{
    /**
     * @inheritDoc
    */
    public function create(): MysqliConnectionInterface
    {
        return new MysqliConnection(
            new MysqliClient()
        );
    }
}
