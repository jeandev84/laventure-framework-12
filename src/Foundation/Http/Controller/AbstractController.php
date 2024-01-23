<?php

declare(strict_types=1);

namespace Laventure\Foundation\Http\Controller;

use Laventure\Component\Container\Common\ContainerAwareTrait;
use Laventure\Component\Container\ContainerAwareInterface;
use Laventure\Foundation\Http\Response\Response;

/**
 * AbstractController
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Http\Controller
 */
abstract class AbstractController implements ContainerAwareInterface
{
    use ContainerAwareTrait;


    /**
     * @param string $template
     * @param array $data
     * @return Response
    */
    public function render(string $template, array $data = []): Response
    {
        return new Response($this->renderView($template, $data));
    }




    /**
     * @param string $template
     * @param array $data
     * @return string
    */
    public function renderView(string $template, array $data = []): string
    {
        return $this->container['view']->render($template, $data);
    }
}
