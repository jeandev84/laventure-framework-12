<?php

declare(strict_types=1);

namespace Laventure\Foundation\Http\Kernel;

use Laventure\Component\Container\Container;
use Laventure\Component\Http\Kernel\Contract\HttpKernelInterface;
use Laventure\Foundation\Application;
use Laventure\Foundation\Http\Request\Request;
use Laventure\Foundation\Http\Response\Response;

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
     * priority middlewares
     *
     * @var string[]
    */
    protected array $middlewarePriority = [];



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
        $this->app = $app;
    }




    /**
     * @inheritDoc
    */
    public function handle($request): Response
    {
        return $this->dispatchRoute($request);
    }




    /**
     * @param Request $request
     * @return Response
    */
    public function dispatchRoute(Request $request): Response
    {
        dump($request);
        dd($this->app->getContainer());
        return new Response('Dispatched Response');
    }




    /**
     * @inheritDoc
    */
    public function terminate($request, $response): void
    {
        $this->app->terminate($request, $response);
    }
}
