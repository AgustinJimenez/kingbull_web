<?php namespace Modules\Wod\Providers;

use Illuminate\Support\ServiceProvider;

class WodServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Wod\Repositories\WodRepository',
            function () {
                $repository = new \Modules\Wod\Repositories\Eloquent\EloquentWodRepository(new \Modules\Wod\Entities\Wod());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Wod\Repositories\Cache\CacheWodDecorator($repository);
            }
        );
// add bindings

    }
}
