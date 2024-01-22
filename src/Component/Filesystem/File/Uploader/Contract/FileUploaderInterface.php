<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Uploader\Contract;


/**
 * FileUploaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Uploader\Contract
 */
interface FileUploaderInterface
{
      /**
       * @param $file
       *
       * @return mixed
      */
      public function upload($file): mixed;
}