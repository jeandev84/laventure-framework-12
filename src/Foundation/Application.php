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
use Psr\Container\ContainerInterface;

/**
 * Application
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation
 */
final class Application extends Container implements ApplicationInterface, TerminableInterface
{
    use ApplicationTrait;




    /**
     * @param string $basePath
    */
    public function __construct(string $basePath)
    {
        $this->setPath($basePath);
        $this->registerBaseBindings();
        $this->registerBaseProviders();
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
    }






    /**
     * @param string $basePath
     * @return $this
    */
    private function setPath(string $basePath): static
    {
        $this->bindings(compact('basePath'));
        $this->bindings([
            'app.path' => $basePath
        ]);

        return $this;
    }




    /**
     * @return void
    */
    private function registerBaseBindings(): void
    {
        static::setInstance($this);
        $this->instances([
            self::class => $this,
            Container::class => $this,
            ContainerInterface::class => $this
        ]);
    }





    private function registerBaseProviders(): void
    {
        $this->addProviders([
            ApplicationServiceProvider::class,
            FilesystemServiceProvider::class,
            ConfigurationServiceProvider::class,
            DatabaseServiceProvider::class,
            RouterServiceProvider::class,
            EventServiceProvider::class,
            ViewServiceProvider::class
        ]);
    }
}
