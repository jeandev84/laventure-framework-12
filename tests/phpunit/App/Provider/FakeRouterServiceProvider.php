<?php

declare(strict_types=1);

namespace PHPUnitTest\App\Provider;

use Laventure\Component\Container\Service\Provider\ServiceProvider;
use Laventure\Component\Routing\Router\Router;

/**
 * FakeRouterServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\App\Provider
 */
class FakeRouterServiceProvider extends ServiceProvider
{
    public const NAMESPACE = "App\\Http\\Controllers";




    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->singletons(Router::class, function () {
            return $this->app->make(Router::class, [
                'namespace' => self::NAMESPACE
            ]);
        });
    }
}
