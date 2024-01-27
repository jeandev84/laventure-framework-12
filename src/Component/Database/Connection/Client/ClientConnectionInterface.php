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
      * Returns instance of connector
      *
      * @return ConnectionInterface
     */
     public function getConnection(): ConnectionInterface;



     /**
      * Returns instance of real connection
      *
      * @param ConfigurationInterface $config
      * @return mixed
     */
     public function makeConnection(ConfigurationInterface $config): mixed;
}