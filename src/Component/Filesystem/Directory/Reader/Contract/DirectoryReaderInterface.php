<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory\Reader\Contract;


use Laventure\Component\Filesystem\Contract\Reader\ReaderInterface;
use Laventure\Component\Filesystem\Directory\Contract\HasDirectoryInterface;

/**
 * DirectoryReaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Directory\Contract\Contract
 */
interface DirectoryReaderInterface extends ReaderInterface, HasDirectoryInterface
{

}