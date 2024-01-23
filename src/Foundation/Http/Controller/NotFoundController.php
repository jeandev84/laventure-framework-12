<?php

declare(strict_types=1);

namespace Laventure\Foundation\Http\Controller;

use Laventure\Foundation\Http\Response\Response;

/**
 * NotFoundController
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Http\Controller
*/
class NotFoundController
{
    public function index(): Response
    {
        return new Response();
    }
}
