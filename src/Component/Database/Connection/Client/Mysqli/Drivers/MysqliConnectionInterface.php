<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Drivers;

use Laventure\Component\Database\Connection\ConnectionInterface;
use mysqli;

/**
 * MysqliConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Drivers
 */
interface MysqliConnectionInterface extends ConnectionInterface
{
    /**
     * @return mysqli
    */
    public function getConnection(): mysqli;
}
