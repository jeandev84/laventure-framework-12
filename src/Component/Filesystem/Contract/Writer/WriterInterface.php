<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Contract\Writer;


/**
 * FilesystemWriterInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Contract\Writer
*/
interface WriterInterface
{
      /**
       * @param string $content
       * @return mixed
      */
      public function write(string $content): mixed;
}