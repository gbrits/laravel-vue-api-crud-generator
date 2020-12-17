<?php

namespace lummy\VueApi;

use Illuminate\Support\ServiceProvider;

class VueApiServiceProvider extends ServiceProvider
{

  protected $commands = [
      'lummy\VueApi\Generate'
  ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

      $this->mergeConfigFrom(
          __DIR__ . '/config/VueApi.php', 'VueApi'
      );

        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


         $this->loadViewsFrom(__DIR__.'/templates', 'VueApi');

        $this->publishes([
             __DIR__ . '/config/VueApi.php' => config_path('VueApi.php'),
         ], 'config');



        $this->publishes([
         __DIR__.'/templates' => resource_path('views/vendor/VueApi'),
       ],'templates');

    }



}
