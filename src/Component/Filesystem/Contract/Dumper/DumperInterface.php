<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Contract\Dumper;


/**
 * DumperInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Contract\Dumper
 */
interface DumperInterface
{

      /**
       * @return mixed
      */
      public function dump(): mixed;
}