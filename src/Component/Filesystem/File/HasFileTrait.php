<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\File;


/**
 * HasFileTrait
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\File
 */
trait HasFileTrait
{

      /**
       * @var string
      */
      protected string $file = '';


      /**
       * @param string $file
       * @return $this
      */
      public function setFile(string $file): static
      {
          $this->file = $file;

          return $this;
      }




      /**
       * @return string
      */
      public function getFile(): string
      {
         return $this->file;
      }
}