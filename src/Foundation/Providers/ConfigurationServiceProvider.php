<?php

declare(strict_types=1);

namespace Laventure\Foundation\Providers;

use Laventure\Component\Config\Config;
use Laventure\Component\Config\ConfigInterface;
use Laventure\Component\Container\Exception\ContainerException;
use Laventure\Component\Container\Provider\Contract\BootableServiceProvider;
use Laventure\Component\Container\Provider\ServiceProvider;
use Laventure\Dotenv\Contract\DotenvInterface;
use Laventure\Dotenv\Dotenv;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionException;

/**
 * ConfigurationServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Providers
 */
class ConfigurationServiceProvider extends ServiceProvider implements BootableServiceProvider
{
    /**
     * @inheritDoc
     */
    public function boot(): void
    {
        $this->dotEnv()->load();
    }



    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->bind('app.env', $_ENV);
        $this->app->singleton(ConfigInterface::class, function () {

            return new Config([]);
        });
    }






    /**
     * @return DotenvInterface
     * @throws ContainerException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ReflectionException
    */
    private function dotEnv(): DotenvInterface
    {
        return $this->app->make(Dotenv::class);
    }
}
