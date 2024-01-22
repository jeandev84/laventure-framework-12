<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Loader;

use Laventure\Component\Filesystem\File\Loader\Contract\DotenvLoaderInterface;
use Laventure\Component\Filesystem\File\Traits\HasFileTrait;

/**
 * DotenvLoader
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Loader
*/
class DotenvLoader extends FileLoader implements DotenvLoaderInterface
{
    use HasFileTrait;


    /**
     * @inheritDoc
    */
    public function match(): bool
    {
        return in_array($this->file, ['.env', '.env.local']);
    }
}