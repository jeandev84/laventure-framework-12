<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Contract\Loader;


/**
 * LoaderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Contract\Loader
 */
interface LoaderInterface
{

     /**
      * Load something
      *
      * @return mixed
     */
     public function load(): mixed;
}