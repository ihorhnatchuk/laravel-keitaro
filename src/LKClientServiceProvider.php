<?php 
namespace Ihorhnatchuk\LKClient;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class LKClientServiceProvider extends ServiceProvider
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
        $this->app->singleton('keitaro-adv', function ($app) {
            return $app->make('Ihorhnatchuk\LKClient\LKClient');
        });

        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('KeitaroAdv', 'Ihorhnatchuk\LKClient\Facades\KeitaroAdv');
        });
       
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['keitaro-adv'];
    }
}
