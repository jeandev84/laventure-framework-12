<?php
declare(strict_types=1);

namespace Laventure\Component\Filesystem\Resource\Contract;


/**
 * FileResourceInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Filesystem\Resource\Contract
*/
interface FileResourceInterface
{
     public function open(string $file): mixed;
}