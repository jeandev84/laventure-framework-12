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
       * @var mixed|null
      */
      protected mixed $context = null;


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



      /**
       * @param mixed $context
       * @return $this
      */
      public function context(mixed $context): static
      {
          $this->context = $context;

          return $this;
      }



      /**
       * @inheritDoc
      */
      public function getContext(): mixed
      {
         return $this->context;
      }
}