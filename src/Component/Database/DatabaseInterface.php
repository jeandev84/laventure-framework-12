<?php

declare(strict_types=1);

namespace Laventure\Component\Database;

/**
 * DatabaseInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database
*/
interface DatabaseInterface
{
    /**
     * Returns name of database
     *
     * @return string
    */
    public function getName(): string;




    /**
     * Create database
     *
     * @return mixed
    */
    public function create(): mixed;






    /**
     * Drop database
     *
     * @return mixed
    */
    public function drop(): mixed;






    /**
     * Returns schemas of database
     *
     * @return array
    */
    public function getSchemas(): array;
}
