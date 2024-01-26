<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Configuration\Contract;

use ArrayAccess;

/**
 * ConfigurationInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Configuration\Contract
 */
interface ConfigurationInterface extends ArrayAccess
{


    /**
     * Returns host name
     *
     * @return string
     */
    public function host(): string;






    /**
     * Returns connection user
     *
     * @return string|null
     */
    public function username(): ?string;






    /**
     * Returns connection password
     *
     * @return string|null
     */
    public function password(): ?string;






    /**
     * Returns port
     *
     * @return string
     */
    public function port(): string;







    /**
     * Returns name of database
     *
     * @return string
     */
    public function database(): string;







    /**
     * Returns database encoding characters
     *
     * @return string
     */
    public function charset(): string;







    /**
     * Returns collation
     *
     * @return string
     */
    public function collation(): string;






    /**
     * Returns table prefix
     *
     * @return string
     */
    public function prefix(): string;








    /**
     * Returns engine name
     *
     * @return string
     */
    public function engine(): string;







    /**
     * Returns the value required.
     * If parameter is not defined we'll throw exception
     *
     * @param string $name
     * @return mixed
    */
    public function required(string $name): mixed;




    /**
     * Determine if the given param exist
     *
     * @param string $name
     *
     * @return bool
    */
    public function has(string $name): bool;





    /**
     * Remove param
     *
     * @param string $name
     *
     * @return bool
     */
    public function remove(string $name): bool;





    /**
     * Determine if value empty
     *
     * @param string $key
     * @return bool
    */
    public function isEmpty(string $key): bool;






    /**
     * Returns all configuration params
     *
     * @return array
     */
    public function getParams(): array;
}