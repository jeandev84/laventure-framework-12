<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Contract\Uploader;


/**
 * UploaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Contract\Uploader
*/
interface UploaderInterface
{

     /**
      * @return mixed
     */
     public function upload(): mixed;
}