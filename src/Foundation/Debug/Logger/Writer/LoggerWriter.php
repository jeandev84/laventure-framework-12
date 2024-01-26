<?php
declare(strict_types=1);

namespace Laventure\Foundation\Debug\Logger\Writer;

use Laventure\Component\Container\Container;
use Laventure\Component\Debug\Logger\Writer\AbstractLoggerWriter;
use Laventure\Component\Filesystem\File\File;

/**
 * LoggerWriter
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Debug\Logger\Writer
*/
class LoggerWriter extends AbstractLoggerWriter
{

    /**
     * @var Container
    */
    protected Container $app;


    /**
     * @param Container $app
    */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }


    /**
     * @inheritDoc
    */
    public function write(): mixed
    {
         $date     = $this->app->get('app.serve.time')->format('Y-m-d H:i:s');
         $logPath  = $this->app->get('app.log.path');
         $env      = $this->app->get('app.env');

         $details = sprintf(
     "%s - Level: %s - Message: %s - Context: %s",
            $date,
            $this->level,
            $this->message,
            json_encode($this->context)
         );

         $filePath = sprintf("%s/%s-%s.log", $logPath, $env, date("j.n.Y"));
         $file     = new File($filePath);
         $file->make();
         return $file->write($details, true);
    }
}