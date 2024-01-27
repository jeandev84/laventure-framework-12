<?php

declare(strict_types=1);

namespace Laventure\Component\Database\Connection\Query\Bindings\Enums;

/**
 * BindType
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Database\Connection\Query\Bindings\Enums
*/
enum BindType
{
    public const Integer = 'integer';
    public const Boolean = 'boolean';
    public const Null    = 'null';
}
