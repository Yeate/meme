<?php

namespace Pokeface\Meme;

use Illuminate\Support\ServiceProvider;
use Pokeface\Meme\Http\Meme;

class MemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/meme.php' => config_path('meme.php'), 
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Meme', function () {
            return new Meme();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Meme');
    }
}
