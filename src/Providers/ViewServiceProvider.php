<?php
namespace Apsg\Providers;

use Illuminate\View\FileViewFinder;
use Illuminate\View\ViewServiceProvider as ConcreteViewServiceProvider;

class ViewServiceProvider extends ConcreteViewServiceProvider
{
    /**
     * Register the view finder implementation.
     *
     * @return void
     */
    public function registerViewFinder()
    {
        $this->app->bind('view.finder', function ($app) {
            $paths = $app['config']['view.paths'];

            //change your paths here
            foreach ($paths as &$path) {
                $path .= time();//change with your requirement here I am adding time value with all path
            }

            return new FileViewFinder($app['files'], $paths);
        });
    }
}
