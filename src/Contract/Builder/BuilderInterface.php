<?php

declare(strict_types=1);

namespace Laventure\Contract\Builder;

/**
 * BuilderInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Writer\Builder
 */
interface BuilderInterface
{
    /**
     * Build something
     *
     * @return mixed
    */
    public function build(): mixed;
}
