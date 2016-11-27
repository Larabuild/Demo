<?php

namespace Larabuild\Themes;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;

use Config;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = "Larabuild\Themes";

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(base_path() . '/resources/themes/' . env('THEME') . '/views', 'Theme');
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => Config::get('theme.namespace') . "\Controllers"], function ($app) {
            require base_path() . '/resources/themes/' . env('THEME') . '/routes.php';
        });
    }
}
