<?php

declare(strict_types=1);

namespace Laventure\Foundation;

use Laventure\Component\Container\Container;
use Laventure\Component\Http\Kernel\Contract\TerminableInterface;
use Laventure\Component\Http\Message\Response\Response;
use Laventure\Contract\Application\ApplicationInterface;
use Laventure\Foundation\Container\Service\Providers\ApplicationServiceProvider;
use Laventure\Foundation\Container\Service\Providers\ConfigurationServiceProvider;
use Laventure\Foundation\Container\Service\Providers\DatabaseServiceProvider;
use Laventure\Foundation\Container\Service\Providers\EventServiceProvider;
use Laventure\Foundation\Container\Service\Providers\FilesystemServiceProvider;
use Laventure\Foundation\Container\Service\Providers\RouterServiceProvider;
use Laventure\Foundation\Container\Service\Providers\ViewServiceProvider;
use Laventure\Foundation\Http\Message\Request\Request;
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
final class Application implements ApplicationInterface, TerminableInterface, ContainerInterface, \ArrayAccess
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
    public function singleton(array $bindings): static
    {
        $this->container->singletons($bindings);

        return $this;
    }




    /**
     * @param array $instances
     * @return $this
    */
    public function instance(array $instances): static
    {
        $this->container->instances($instances);

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
        //echo __CLASS__ . " works! with next response :)";
        //echo '<hr>';

        echo $response;
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
            DatabaseServiceProvider::class,
            RouterServiceProvider::class,
            EventServiceProvider::class,
            ViewServiceProvider::class
        ]);

        return $container;
    }




    /**
     * @inheritDoc
    */
    public function offsetExists(mixed $offset): bool
    {
        return $this->container->offsetExists($offset);
    }




    /**
     * @inheritDoc
    */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->container->offsetGet($offset);
    }




    /**
     * @inheritDoc
    */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->container->offsetSet($offset, $value);
    }




    /**
     * @inheritDoc
    */
    public function offsetUnset(mixed $offset): void
    {
        $this->container->offsetUnset($offset);
    }
}
