<?php
declare(strict_types=1);

namespace Laventure\Foundation\Http\Handlers\Contract;


use Laventure\Foundation\Http\Request\Request;
use Laventure\Foundation\Http\Response\Response;

/**
 * HandlerInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Http\Handlers\Contract
 */
interface HandlerInterface
{
    /**
     * @param Request $request
     * @return Response
    */
    public function handle(Request $request): Response;
}