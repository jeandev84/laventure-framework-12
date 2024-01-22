<?php
declare(strict_types=1);

namespace Laventure\Foundation\Service\Providers;

use Laventure\Component\Container\Provider\ServiceProvider;
use Laventure\Component\Filesystem\Filesystem;

/**
 * FilesystemServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Service\Providers
*/
class FilesystemServiceProvider extends ServiceProvider
{

    /**
     * @var array
    */
    protected array $provides = [

    ];


    /**
     * @inheritDoc
    */
    public function register(): void
    {
        $this->app->singleton(Filesystem::class, function () {
             return new Filesystem($this->app['basePath']);
        });
    }
}