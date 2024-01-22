<?php

declare(strict_types=1);

namespace Laventure\Component\Dotenv;

/**
 * DotenvInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Dotenv\Contract
 */
interface DotenvInterface
{
    /**
     * Load environments
     *
     * @param string $file
     *
     * @return void
     */
    public function load(string $file = ''): void;







    /**
     * Export environments
     *
     * @param string $file
     *
     * @return bool
     */
    public function export(string $file = '.env.local'): mixed;









    /**
     * @return void
     */
    public function clear(): void;
}
