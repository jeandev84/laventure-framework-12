<?php

declare(strict_types=1);

namespace Laventure\Component\Routing\Route\Resource\Enums;

/**
 * ResourceType
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Routing\Resource\Enums
*/
enum ResourceType: string
{
    public const WEB = 'web';
    public const API = 'api';
}
