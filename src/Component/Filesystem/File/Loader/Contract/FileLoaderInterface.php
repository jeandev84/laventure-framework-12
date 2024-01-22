<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Loader\Contract;


use Laventure\Component\Filesystem\Contract\Loader\LoaderInterface;

/**
 * FileLoaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Loader\Contract
*/
interface FileLoaderInterface extends LoaderInterface
{

    /**
     * @return string
    */
    public function getFile(): string;
}