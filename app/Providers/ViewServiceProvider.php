<?php

namespace App\Providers;

use Library\Framework\Core\Application;
use Library\Framework\Core\Provider;
use Library\Framework\View\View;

class ViewServiceProvider extends Provider
{
    /**
     * @var Application
     */
    protected Application $app;

    /**
     * @param \Library\Framework\Core\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function register()
    {
        $this->app->singleton(View::class, function () {
            return new View(
                config('view.path'),
                config('view.cache'),
                config('view.extension')
            );
        });
    }

    public function boot()
    {

    }
}