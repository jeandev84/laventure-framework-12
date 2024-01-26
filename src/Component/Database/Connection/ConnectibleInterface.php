<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection;


use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Status\ConnectionStatusInterface;

/**
 * ConnectibleInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
 */
interface ConnectibleInterface extends ConnectionStatusInterface
{


    /**
     * Parse credentials
     *
     * @param ConfigurationInterface $config
     * @return mixed
    */
    public function credentials(ConfigurationInterface $config): mixed;






    /**
     * Connect to driver
     *
     * @return mixed
    */
    public function connect(): mixed;







    /**
     * Disconnect client
     *
     * @return void
    */
    public function disconnect(): void;







    /**
     * Reconnect client
     *
     * @return mixed
    */
    public function reconnect(): mixed;
}