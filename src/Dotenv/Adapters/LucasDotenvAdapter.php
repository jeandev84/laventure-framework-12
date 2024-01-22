<?php

declare(strict_types=1);

namespace Laventure\Dotenv\Adapters;

use Laventure\Dotenv\DotenvInterface;

/**
 * LucasDotenvAdapter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Dotenv\Adapters
 */
class LucasDotenvAdapter implements DotenvInterface
{
    /**
     * @inheritDoc
    */
    public function load(string $file = '.env'): void
    {

    }



    /**
     * @inheritDoc
    */
    public function export(string $file = '.env.local'): bool
    {
        return true;
    }





    /**
     * @inheritDoc
    */
    public function clear(): void
    {

    }
}
