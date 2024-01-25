<?php
declare(strict_types=1);

namespace Laventure\Component\Debug\Exception\Handler\Manager;

use Laventure\Component\Debug\Exception\Handler\Register\HandleRegisterInterface;
use Laventure\Contract\Runner\RunnerInterface;

/**
 * HandlerManager
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Component\Debug\Exception\Handler\Manager
 */
class HandlerManager implements HandlerManagerInterface
{


    /**
     * @var array
    */
    protected array $handlers = [];





    /**
     * @param HandleRegisterInterface $register
    */
    public function __construct(HandleRegisterInterface $register)
    {
    }



    /**
     * @inheritDoc
    */
    public function run()
    {

    }




    /**
     * @inheritDoc
    */
    public function getHandlers(): array
    {
        return $this->handlers;
    }
}