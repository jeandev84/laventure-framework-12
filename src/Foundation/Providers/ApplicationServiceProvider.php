<?php
declare(strict_types=1);

namespace Laventure\Foundation\Providers;

use Laventure\Component\Container\Exception\ContainerException;
use Laventure\Component\Container\Provider\Contract\BootableServiceProvider;
use Laventure\Component\Container\Provider\ServiceProvider;
use Laventure\Component\Filesystem\Filesystem;
use Laventure\Component\Filesystem\FilesystemInterface;
use Laventure\Dotenv\Dotenv;
use Laventure\Dotenv\DotenvInterface;
use Laventure\Foundation\Facade\Route\Route;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * ApplicationServiceProvider
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Laventure\Foundation\Providers
 */
class ApplicationServiceProvider extends ServiceProvider implements BootableServiceProvider
{

    /**
     * @var array
     */
    protected array $provides = [];




    /**
     * @inheritDoc
    */
    public function boot(): void
    {
        $this->loadHelpers();
        $this->loadFacades();
    }



    /**
     * @inheritDoc
    */
    public function register(): void
    {
    }




    private function loadHelpers(): void
    {
        require_once realpath(__DIR__.'/../helpers.php');
    }



    private function loadFacades(): void
    {
        #Route::get('', '', '')->wheres();
        $this->app->addFacades([

        ]);
    }
}