<?php

declare(strict_types=1);

namespace Laventure\Contract\Export;

/**
 * ExportInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Writer\Export
 */
interface ExportInterface
{
    /**
     * Export something
     *
     * @return mixed
    */
    public function export(): mixed;
}
