<?php

declare(strict_types=1);

namespace Laventure\Foundation\Http\Kernel;

use Laventure\Component\Container\Container;
use Laventure\Component\Http\Kernel\Contract\HttpKernelInterface;
use Laventure\Foundation\Application;
use Laventure\Foundation\Http\Handlers\Bus\Pipeline;
use Laventure\Foundation\Http\Request\Request;
use Laventure\Foundation\Http\Response\Response;
use Throwable;


/**
 * HttpKernel
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Web\Http\Kernel
 */
class HttpKernel implements HttpKernelInterface
{
    /**
     * @var Application
    */
    protected Application $app;




    /**
     * @var Container
    */
    protected Container $container;



    /**
     * priority middlewares
     *
     * @var string[]
    */
    private array $middlewarePriority = [];



    /**
     * priority route middlewares
     *
     * @var string[]
    */
    protected array $routeMiddlewares = [];




    /**
     * @param Application $app
    */
    public function __construct(Application $app)
    {
        $this->app       = $app;
        $this->container = $app->getContainer();
    }




    /**
     * @inheritDoc
    */
    public function handle($request): Response
    {
        try {
            $response =  $this->dispatchRoute($request);
        } catch (Throwable $e) {
            $response = $this->exceptionResponse($e);
        }

        // TODO load events before returns response
        return $response;
    }




    /**
     * @param Request $request
     * @return Response
    */
    private function dispatchRoute(Request $request): Response
    {
        $this->container->instance(Request::class, $request);

        return (new Pipeline($this->container))
               ->pipe($this->middlewareStack())
               ->handle($request);
    }





    /**
     * @param Throwable $e
     * @return Response
    */
    private function exceptionResponse(Throwable $e): Response
    {
        return new Response($e->getMessage());
    }





    /**
     * @inheritDoc
    */
    public function terminate($request, $response): void
    {
        $this->app->terminate($request, $response);
    }



    private function middlewareStack(): array
    {
        return array_merge(
            $this->middlewarePriority,
            $this->routeMiddlewares
        );
    }
}
