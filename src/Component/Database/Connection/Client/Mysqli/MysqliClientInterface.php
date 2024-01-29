<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli;


use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientInterface;
use mysqli;

/**
 * MysqliClientInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli
 */
interface MysqliClientInterface extends ClientInterface
{

      /**
       * @param ConfigurationInterface $config
       * @return mysqli
      */
      public function makeConnection(ConfigurationInterface $config): mysqli;
}