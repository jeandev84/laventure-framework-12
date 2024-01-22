<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File\Base64;


/**
 * Base64FileInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File\Base64
 */
interface Base64FileInterface
{

      /**
       * Returns encoded string
       *
       * @return string
      */
      public function getSource(): string;



      /**
       * Determine if encoded string if valid
       *
       * @return bool
      */
      public function isValid(): bool;




      /**
       * Returns data
       *
       * @return string
      */
      public function getData(): string;




      /**
       * Returns extension
       *
       * @return string
      */
      public function getExtension(): string;




      /**
       * Returns data size
       *
       * @return int
      */
      public function getSize(): int;





      /**
       * Returns mime type
       *
       * @return string
      */
      public function getClientMimeType(): string;
}