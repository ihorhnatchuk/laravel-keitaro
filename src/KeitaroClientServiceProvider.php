<?php 
namespace Ihorhnatchuk\LaravelKeitaro;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class KeitaroClientServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('keitaro-client', function ($app) {
            return $app->make('Ihorhnatchuk\LaravelKeitaro\KeitaroClient');
        });

        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('KeitaroClient', 'Ihorhnatchuk\LaravelKeitaro\Facades\KeitaroClient');
        });
       
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['keitaro-client'];
    }
}
