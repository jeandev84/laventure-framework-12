<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File;


/**
 * HasFileInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File
 */
interface HasFileInterface
{

     /**
      * @return string
     */
     public function getFile(): string;
}