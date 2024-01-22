<?php

declare(strict_types=1);

namespace Laventure\Contract\Writer;

/**
 * FilesystemWriterInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Contract\Writer
*/
interface WriterInterface
{
    /**
     * @param string $content
     * @return mixed
    */
    public function write(string $content): mixed;
}
