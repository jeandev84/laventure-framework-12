<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory\Reader\Contract;


/**
 * DirectoryReaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Directory\Reader\Contract
 */
interface DirectoryReaderInterface
{

     /**
      * @param string $directory
      * @return mixed
     */
     public function readDirectory(string $directory): mixed;
}