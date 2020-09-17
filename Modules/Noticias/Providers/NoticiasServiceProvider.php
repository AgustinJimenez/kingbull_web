<?php namespace Modules\Noticias\Providers;

use Illuminate\Support\ServiceProvider;

class NoticiasServiceProvider extends ServiceProvider
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
            'Modules\Noticias\Repositories\NoticiaRepository',
            function () {
                $repository = new \Modules\Noticias\Repositories\Eloquent\EloquentNoticiaRepository(new \Modules\Noticias\Entities\Noticia());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Noticias\Repositories\Cache\CacheNoticiaDecorator($repository);
            }
        );
// add bindings

    }
}
