<?php
declare(strict_types=1);

namespace Laventure\Foundation\Providers;

use Laventure\Component\Container\Provider\ServiceProvider;
use Laventure\Component\Templating\Renderer\Renderer;
use Laventure\Component\Templating\Renderer\RendererInterface;

/**
 * ViewServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Providers
*/
class ViewServiceProvider extends ServiceProvider
{

    /**
     * @var array
    */
    protected array $provides = [
        RendererInterface::class => [
            Renderer::class
        ]
    ];



    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->singleton(RendererInterface::class, function () {
            return new \stdClass();
        });
    }
}