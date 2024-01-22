<?php
declare(strict_types=1);

namespace Laventure\Foundation\Providers;

use Laventure\Component\Container\Exception\ContainerException;
use Laventure\Component\Container\Provider\Contract\BootableServiceProvider;
use Laventure\Component\Container\Provider\ServiceProvider;
use Laventure\Dotenv\Dotenv;
use Laventure\Dotenv\DotenvInterface;
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
        $this->loadEnvironments();
    }



    /**
     * @inheritDoc
    */
    public function register(): void
    {

    }






    /**
     * @return void
     * @throws ContainerException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ReflectionException
     */
    private function loadEnvironments(): void
    {
        $dotenv = $this->makeDotEnv();
        $dotenv->load('.env.local'); // TODO reviews load correct file depended of environment DEV or PROD
    }






    /**
     * @return DotenvInterface
     * @throws ContainerException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ReflectionException
    */
    private function makeDotEnv(): DotenvInterface
    {
        return $this->app->make(Dotenv::class);
    }
}