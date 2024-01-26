<?php
declare(strict_types=1);

namespace Laventure\Foundation\Container\Service\Providers;

use Laventure\Component\Container\Service\Provider\ServiceProvider;
use Laventure\Component\Debug\Logger\Logger;
use Laventure\Foundation\Debug\Logger\Writer\LoggerWriter;
use Psr\Log\LoggerInterface;

/**
 * LoggerServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Providers
 */
class LoggerServiceProvider extends ServiceProvider
{

    /**
     * @var array
    */
    protected array $provides = [
       LoggerInterface::class => [Logger::class, 'logger']
    ];


    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->singleton(LoggerInterface::class, function () {
            $writer = new LoggerWriter($this->app);
            return new Logger($writer);
        });
    }
}