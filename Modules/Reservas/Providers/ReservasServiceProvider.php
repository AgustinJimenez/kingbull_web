<?php namespace Modules\Reservas\Providers;

use Illuminate\Support\ServiceProvider;

class ReservasServiceProvider extends ServiceProvider
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
            'Modules\Reservas\Repositories\DiaRepository',
            function () {
                $repository = new \Modules\Reservas\Repositories\Eloquent\EloquentDiaRepository(new \Modules\Reservas\Entities\Dia());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Reservas\Repositories\Cache\CacheDiaDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Reservas\Repositories\HorarioRepository',
            function () {
                $repository = new \Modules\Reservas\Repositories\Eloquent\EloquentHorarioRepository(new \Modules\Reservas\Entities\Horario());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Reservas\Repositories\Cache\CacheHorarioDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Reservas\Repositories\ReservaRepository',
            function () {
                $repository = new \Modules\Reservas\Repositories\Eloquent\EloquentReservaRepository(new \Modules\Reservas\Entities\Reserva());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Reservas\Repositories\Cache\CacheReservaDecorator($repository);
            }
        );
// add bindings



    }
}
