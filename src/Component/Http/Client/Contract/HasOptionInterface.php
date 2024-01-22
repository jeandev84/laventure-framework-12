<?php

declare(strict_types=1);

namespace Laventure\Component\Http\Client\Contract;

/**
 * HasOptionInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Http\Client\Contract
 */
interface HasOptionInterface
{
    /**
     * @param array $options
     * @return $this
    */
    public function withOptions(array $options): static;
}
