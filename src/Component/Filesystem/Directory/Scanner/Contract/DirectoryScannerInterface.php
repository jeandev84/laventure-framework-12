<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory\Scanner\Contract;


use Laventure\Component\Filesystem\Contract\Scanner\ScannerInterface;
use Laventure\Component\Filesystem\Directory\Contract\HasDirectoryInterface;

/**
 * DirectoryScannerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Directory\Scanner\Contract
 */
interface DirectoryScannerInterface extends ScannerInterface, HasDirectoryInterface
{

}