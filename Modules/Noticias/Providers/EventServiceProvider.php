<?php namespace Modules\Noticias\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Noticias\Events\NoticiaWasCreated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        NoticiaWasCreated::class => [
            NoticiaWasCreated::class
        ],
    ];
}