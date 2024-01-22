<?php
declare(strict_types=1);

namespace Laventure\Foundation\Http\Handlers\Bus;

use Laventure\Component\Container\Container;
use Laventure\Component\Http\Handlers\Contract\PipelineInterface;
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
       * @param Container $app
      */
      public function __construct(protected Container $app)
      {
      }




      /**
       * @inheritdoc
      */
      public function pipe(array $middlewares): static
      {
           return $this;
      }



     /**
      * @inheritDoc
     */
     public function handle($request): mixed
     {

     }
}