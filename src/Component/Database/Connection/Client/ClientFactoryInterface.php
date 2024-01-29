<?php
declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;


/**
 * ClientFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Extensions
 */
interface ClientFactoryInterface
{

       /**
        * @param string $name
        * @return ClientInterface
       */
       public function createClient(string $name): ClientInterface;
}