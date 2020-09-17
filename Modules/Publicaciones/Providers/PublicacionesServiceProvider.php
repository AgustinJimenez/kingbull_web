<?php namespace Modules\Publicaciones\Providers;

use Illuminate\Support\ServiceProvider;

class PublicacionesServiceProvider extends ServiceProvider
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
            'Modules\Publicaciones\Repositories\PublicacionesRepository',
            function () {
                $repository = new \Modules\Publicaciones\Repositories\Eloquent\EloquentPublicacionesRepository(new \Modules\Publicaciones\Entities\Publicaciones());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Publicaciones\Repositories\Cache\CachePublicacionesDecorator($repository);
            }
        );
// add bindings

    }
}
