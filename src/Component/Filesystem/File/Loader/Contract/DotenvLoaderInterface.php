<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Loader\Contract;


use Laventure\Component\Filesystem\File\Contract\HasFileInterface;
use Laventure\Contract\Matcher\MatcherInterface;

/**
 * DotenvLoaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Loader\Contract
*/
interface DotenvLoaderInterface extends FileLoaderInterface, MatcherInterface, HasFileInterface
{
    const EXTENSION = '.env';
}