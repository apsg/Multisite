<?php

namespace Apsg\Multisite\Providers;

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

            $paths[] = resource_path('views/' . $app['config']['multisite.domain']);

            return new FileViewFinder($app['files'], $paths);
        });
    }
}
