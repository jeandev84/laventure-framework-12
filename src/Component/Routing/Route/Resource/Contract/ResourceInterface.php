<?php

declare(strict_types=1);

namespace Laventure\Component\Routing\Route\Resource\Contract;

use Laventure\Component\Routing\Route\Collector\RouteCollectorInterface;
use Laventure\Component\Routing\Route\RouteInterface;

/**
 * ResourceInterface
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Routing\Route\Resource\Writer
 */
interface ResourceInterface
{
    /**
     * Returns storage name
     *
     * @return string
    */
    public function getName(): string;




    /**
     * Returns storage controller
     *
     * @return string
    */
    public function getController(): string;




    /**
     * Returns storage type
     *
     * @return string
    */
    public function getType(): string;




    /**
     * @param RouteCollectorInterface $collector
     *
     * @return RouteCollectorInterface
    */
    public function map(RouteCollectorInterface $collector): RouteCollectorInterface;
}
