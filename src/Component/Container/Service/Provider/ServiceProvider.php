<?php

declare(strict_types=1);

namespace Laventure\Component\Container\Service\Provider;

use Laventure\Component\Container\Service\Provider\Common\ServiceProviderTrait;
use Laventure\Component\Container\Service\Provider\Contract\ServiceProviderInterface;

/**
 * ServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Container\Provider
 */
abstract class ServiceProvider implements ServiceProviderInterface
{
    use ServiceProviderTrait;
}
