<?php namespace Modules\Contacto\Providers;

use Illuminate\Support\ServiceProvider;

class ContactoServiceProvider extends ServiceProvider
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
            'Modules\Contacto\Repositories\ContactoRepository',
            function () {
                $repository = new \Modules\Contacto\Repositories\Eloquent\EloquentContactoRepository(new \Modules\Contacto\Entities\Contacto());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Contacto\Repositories\Cache\CacheContactoDecorator($repository);
            }
        );
// add bindings

    }
}
