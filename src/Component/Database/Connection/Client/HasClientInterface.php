<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client;

/**
 * HasClientInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client
*/
interface HasClientInterface
{
    /**
     * @return ClientConnectionInterface
    */
    public function getClient(): ClientConnectionInterface;
}
