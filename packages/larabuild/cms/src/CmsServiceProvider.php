<?php

namespace Larabuild\Cms;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;

use Config;

class CmsServiceProvider extends ServiceProvider
{
    protected $namespace = "Larabuild\Cms";

    public function boot()
    {
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'cms');

      if ($this->app->runningInConsole()) {
          $this->publishes([
              __DIR__.'/../public' => public_path('larabuild/cms'),
          ], 'larabuild/assets');
      }
    }

    public function register()
    {
        /*
         * Register the service provider for the dependency.
         */
        $this->app->register('Collective\Html\HtmlServiceProvider');
        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Form', 'Collective\Html\FormFacade');
        $loader->alias('Html', 'Collective\Html\HtmlFacade');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {

    }
}
