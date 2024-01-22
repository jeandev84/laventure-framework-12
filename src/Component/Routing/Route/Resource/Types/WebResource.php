<?php

declare(strict_types=1);

namespace Laventure\Component\Routing\Route\Resource\Types;

use Laventure\Component\Routing\Route\Collector\RouteCollectorInterface;
use Laventure\Component\Routing\Route\Resource\Decorator\ResourceCollectorDecorator;
use Laventure\Component\Routing\Route\Resource\Enums\ResourceType;
use Laventure\Component\Routing\Route\Resource\Resource;

/**
 * WebResource
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Routing\Route\Resource\Types
*/
class WebResource extends Resource
{
    /**
     * @param string $name
     * @param string $controller
    */
    public function __construct(string $name, string $controller)
    {
        parent::__construct(ResourceType::WEB, $name, $controller);
    }




    /**
     * @inheritDoc
    */
    public function map(RouteCollectorInterface $collector): RouteCollectorInterface
    {
        $collector->get($this->path(), $this->action('index'), $this->name('index'));
        $collector->get($this->path('/{id}'), $this->action('show'), $this->name('show'));
        $collector->get($this->path(), $this->action('create'), $this->name('create'));
        $collector->post($this->path(), $this->action('store'), $this->name('store'));
        $collector->map('PUT|PATCH', $this->path('/{id}'), $this->action('update'), $this->name('update'));
        $collector->delete($this->path('/{id}'), $this->action('destroy'), $this->name('destroy'));
        return $collector;
    }
}
