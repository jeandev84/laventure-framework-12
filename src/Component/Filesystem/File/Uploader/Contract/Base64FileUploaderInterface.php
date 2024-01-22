<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Uploader\Contract;


use Laventure\Component\Filesystem\Contract\Uploader\UploaderInterface;
use Laventure\Component\Filesystem\File\Base64\Base64FileInterface;

/**
 * Base64FileUploaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Uploader\Contract
 */
interface Base64FileUploaderInterface extends UploaderInterface
{

      /**
       * @return Base64FileInterface
      */
      public function getFileBase64(): Base64FileInterface;
}