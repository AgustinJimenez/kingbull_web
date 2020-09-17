<?php namespace Modules\Wod\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Wod\Events\WodWasCreated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        WodWasCreated::class => [
            WodWasCreated::class
        ],
    ];
}