<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Directory;

use Laventure\Component\Filesystem\Directory\Info\DirectoryInfo;
use Laventure\Component\Filesystem\Directory\Iterator\DirectoryIterator;
use Laventure\Component\Filesystem\Directory\Reader\DirectoryReader;
use SplFileInfo;

/**
 * Directory
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Directory
*/
class Directory
{

      /**
       * @var string
      */
      protected string $path;


      /**
       * @var DirectoryReader
      */
      protected DirectoryReader $reader;



      /**
       * @param string $path
      */
      public function __construct(string $path)
      {
          $this->path   = $path;
          $this->reader = new DirectoryReader($path);
      }




      /**
       * @return SplFileInfo
      */
      public function info(): SplFileInfo
      {
         return new DirectoryInfo($this->path);
      }



      /**
       * @param string $extension
       *
       * @return DirectoryIterator
      */
      public function iterate(string $extension): DirectoryIterator
      {
          return new DirectoryIterator($this->path, $extension);
      }





      /**
       * @return mixed
      */
      public function read(): mixed
      {
         return $this->reader->read();
      }




      /**
       * @return string
      */
      public function getPath(): string
      {
          return $this->path;
      }
}