<?php
declare(strict_types=1);

namespace Laventure\Foundation\Http\Handlers;


use Laventure\Foundation\Http\Handlers\Contract\HandlerInterface;
use Laventure\Foundation\Http\Request\Request;
use Laventure\Foundation\Http\Response\Response;

/**
 * NotFoundHandler
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Http\Handlers
*/
class NotFoundHandler implements HandlerInterface
{

      /**
       * @inheritdoc
      */
      public function handle(Request $request): Response
      {
           return new Response(__METHOD__);
      }
}