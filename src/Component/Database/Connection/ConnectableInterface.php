<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection;


/**
 * ConnectableInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
*/
interface ConnectableInterface
{
    /**
     * @param $config
     *
     * @return mixed
     */
    public function connect($config): mixed;






    /**
     * Returns instance of connection
     *
     * @return mixed
    */
    public function getConnection(): mixed;
}