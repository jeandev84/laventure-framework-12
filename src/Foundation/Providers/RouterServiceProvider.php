<?php

declare(strict_types=1);

namespace Laventure\Foundation\Providers;

use App\Http\Controllers\WelcomeController;
use Laventure\Component\Container\Provider\ServiceProvider;
use Laventure\Component\Routing\Route\Collector\RouteCollector;
use Laventure\Component\Routing\Route\Collector\RouteCollectorInterface;
use Laventure\Component\Routing\Router\Router;
use Laventure\Component\Routing\Router\RouterInterface;

/**
 * RouterServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Providers
 */
class RouterServiceProvider extends ServiceProvider
{
    /**
     * @var string
    */
    protected string $namespace = "App\\Http\\Controllers";


    /**
     * @var array
    */
    protected array $provides = [
        RouterInterface::class => [
            Router::class,
            RouteCollector::class,
            RouteCollectorInterface::class
        ]
    ];


    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->singleton(RouterInterface::class, function () {
            $router = new Router($this->namespace);
            $handler = require $this->app['basePath'] . '/config/routes/web.php';
            return call_user_func($handler, $router);
        });
    }
}
