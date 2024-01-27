<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;


use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\ConnectionInterface;

/**
 * ClientConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client
*/
interface ClientConnectionInterface
{
     /**
      * @param ConfigurationInterface $config
      * @return mixed
     */
     public function make(ConfigurationInterface $config): mixed;



     /**
      * Returns current connection
      *
      * @return ConnectionInterface
     */
     public function getConnection(): ConnectionInterface;
}