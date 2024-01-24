<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection;

use Laventure\Component\Database\Configuration\Contract\ConfigurationInterface;
use Laventure\Component\Database\Connection\Client\ClientConnectionInterface;
use Laventure\Component\Database\Connection\Query\QueryInterface;

/**
 * ConnectionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection
*/
interface ConnectionInterface extends HasConnectionInterface
{


    /**
     * Prepare query
     *
     * @param string $sql
     *
     * @return QueryInterface
    */
    public function statement(string $sql): QueryInterface;








    /**
     * Execute query
     *
     * @param string $sql
     *
     * @return bool
    */
    public function executeQuery(string $sql): bool;









    /**
     * Returns configuration
     *
     * @return ConfigurationInterface
    */
    public function getConfiguration(): ConfigurationInterface;
}
