<?php

declare(strict_types=1);

namespace PHPUnitTest\App\Provider;

use Laventure\Component\Container\Service\Provider\ServiceProvider;
use PHPUnitTest\App\Services\FooService;

/**
 * FooServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\App\Provider
 */
class FooServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->instances(FooService::class, $this->app->make(FooService::class));
    }
}
