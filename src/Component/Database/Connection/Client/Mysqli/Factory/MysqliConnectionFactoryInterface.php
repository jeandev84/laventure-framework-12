<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Client\Mysqli\Factory;

use Laventure\Component\Database\Connection\Client\Mysqli\Drivers\MysqliConnectionInterface;

/**
 * MysqliConnectionFactoryInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Client\Mysqli\Factory
 */
interface MysqliConnectionFactoryInterface
{
    /**
     * @return MysqliConnectionInterface
    */
    public function create(): MysqliConnectionInterface;
}
