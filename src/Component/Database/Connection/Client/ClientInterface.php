<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;

/**
 * ClientInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Extensions
*/
interface ClientInterface
{
    /**
     * @return string
    */
    public function getName(): string;



    /**
      * Returns something like PDO, mysqli ...
      *
      * @param ConfigurationInterface $config
      * @return mixed
    */
    public function makeConnection(ConfigurationInterface $config): mixed;
}
