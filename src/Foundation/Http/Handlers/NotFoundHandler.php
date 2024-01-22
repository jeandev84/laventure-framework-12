<?php
declare(strict_types=1);

namespace Laventure\Foundation\Http\Handlers;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * NotFoundHandler
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Http\Handlers
*/
class NotFoundHandler implements RequestHandlerInterface
{

    public function __construct()
    {
    }

    /**
     * @inheritDoc
    */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {

    }
}