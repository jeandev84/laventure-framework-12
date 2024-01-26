<?php
declare(strict_types=1);

namespace Laventure\Foundation\Container\Service\Providers;

use Laventure\Component\Container\Service\Provider\ServiceProvider;
use Laventure\Component\Debug\Logger\Logger;
use Laventure\Foundation\Debug\Logger\Writer\DTO\LoggerWriterDto;
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
        $this->app->singletons(LoggerInterface::class, function () {
            return new Logger($this->makeLoggerWriter());
        });
    }






    private function makeLoggerWriter(): LoggerWriter
    {
        $date     = $this->app->get('app.serve.time')->format('Y-m-d H:i:s');
        $logPath  = $this->app->get('app.log.path');
        $env      = $this->app->get('app.env');

        $dto = new LoggerWriterDto(
            $date, $logPath, $env
        );

        return $this->app->make(LoggerWriter::class, [
            'dto' => $dto
        ]);
    }
}