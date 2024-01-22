<?php

declare(strict_types=1);

namespace Laventure\Component\Filesystem\Utils;

/**
 * DirectoryMaker
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Utils
 */
class DirectoryMaker
{
    /**
     * @param string $directory
     * @return bool
   */
    public static function make(string $directory): bool
    {
        if (is_dir($directory)) {
            return true;
        }

        return mkdir($directory, 0777, true);
    }
}
