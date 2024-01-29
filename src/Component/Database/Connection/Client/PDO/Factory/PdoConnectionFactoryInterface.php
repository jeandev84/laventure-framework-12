<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\PDO\Factory;


use Laventure\Component\Database\Connection\Client\PDO\Drivers\PdoConnectionInterface;

/**
 * PdoConnectionFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Factory
*/
interface PdoConnectionFactoryInterface
{


     /**
      * @param string $driver
      * @return PdoConnectionInterface
     */
     public function createPdo(string $driver): PdoConnectionInterface;
}