<?php
declare(strict_types=1);

namespace Laventure\Foundation\Http\Handlers\Bus;

use Laventure\Component\Container\Container;
use Laventure\Component\Http\Handlers\Contract\PipelineInterface;
use Laventure\Foundation\Http\Handlers\MiddlewareStackHandler;
use Laventure\Foundation\Http\Response\Response;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Pipeline
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Http\Handlers\Bus
*/
class Pipeline implements PipelineInterface
{


      /**
       * @var Container
      */
      protected Container $app;


      /**
       * @var MiddlewareStackHandler
      */
      protected MiddlewareStackHandler $handler;


      /**
       * @param Container $app
      */
      public function __construct(Container $app)
      {
          $this->app     = $app;
          $this->handler = $app[MiddlewareStackHandler::class];
      }




      /**
       * @inheritdoc
      */
      public function pipe(array $middlewares): static
      {
           foreach ($middlewares as $middleware) {
               $this->handler->add($this->app->get($middleware));
           }

           return $this;
      }




     /**
      * @inheritDoc
     */
     public function handle($request): Response
     {
          return $this->handler->handle($request);
     }
}