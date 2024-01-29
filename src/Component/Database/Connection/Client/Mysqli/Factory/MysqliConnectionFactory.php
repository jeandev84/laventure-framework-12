<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Factory;

use Laventure\Component\Database\Connection\Client\Mysqli\Drivers\Mysql\MysqlConnection;
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
    public function createMysqli(): MysqliConnectionInterface
    {
        return new MysqlConnection(
            new MysqliClient()
        );
    }
}