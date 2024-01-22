<?php

declare(strict_types=1);

namespace Laventure\Foundation;

use Laventure\Component\Container\Container;
use Laventure\Component\Container\Utils\DTO\BoundInterface;
use Laventure\Component\Http\Kernel\Contract\TerminableInterface;
use Laventure\Contract\Application\ApplicationInterface;
use Laventure\Foundation\Http\Request\Request;
use Laventure\Foundation\Http\Response\Response;
use Laventure\Foundation\Providers\ApplicationServiceProvider;
use Laventure\Foundation\Providers\ConfigurationServiceProvider;
use Laventure\Foundation\Providers\DatabaseServiceProvider;
use Laventure\Foundation\Providers\EventServiceProvider;
use Laventure\Foundation\Providers\FilesystemServiceProvider;
use Laventure\Foundation\Providers\RouterServiceProvider;
use Laventure\Foundation\Providers\ViewServiceProvider;
use Laventure\Traits\Application\ApplicationTrait;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Application
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation
 */
final class Application implements ApplicationInterface, TerminableInterface, ContainerInterface
{
    use ApplicationTrait;



    /**
     * @var Container
    */
    protected Container $container;



    /**
     * @param Container $container
     * @param string $basePath
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws \ReflectionException
    */
    public function __construct(Container $container, string $basePath)
    {
        $this->registerBaseBindings($container, $basePath);
        $this->registerBaseProviders($container);
        $this->container = $container;
    }





    /**
     * @param array $bindings
     * @return $this
    */
    public function singletons(array $bindings): static
    {
        $this->container->singletons($bindings);

        return $this;
    }




    /**
     * @inheritDoc
    */
    public function terminate($request, $response): void
    {
        $this->emit($request, $response);
    }




    /**
     * @param Request $request
     * @param Response $response
     * @return void
    */
    private function emit(Request $request, Response $response): void
    {
        echo __CLASS__ . " works! with next response :)";
        echo '<hr>';

        echo (string)$response;
    }






    /**
     * @inheritDoc
    */
    public function get(string $id)
    {
        return $this->container->get($id);
    }




    /**
     * @inheritDoc
    */
    public function has(string $id): bool
    {
        return $this->container->has($id);
    }





    /**
     * @return Container
    */
    public function getContainer(): Container
    {
        return $this->container;
    }





    /**
     * @param Container $container
     * @param string $basePath
     * @return Container
    */
    private function registerBaseBindings(Container $container, string $basePath): Container
    {
        $container->bindings(compact('basePath'));
        $container->instance(self::class, $this);
        $container->instance(Container::class, $container);
        $container->instance(ContainerInterface::class, $container);

        return $container;
    }




    /**
     * @param Container $container
    */
    private function registerBaseProviders(Container $container): Container
    {
        $container->addProviders([
            ApplicationServiceProvider::class,
            FilesystemServiceProvider::class,
            ConfigurationServiceProvider::class,
            RouterServiceProvider::class,
            EventServiceProvider::class,
            DatabaseServiceProvider::class,
            ViewServiceProvider::class
        ]);

        return $container;
    }
}
