<?php namespace Modules\Reservas\Repositories\Cache;

use Modules\Reservas\Repositories\ReservaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheReservaDecorator extends BaseCacheDecorator implements ReservaRepository
{
    public function __construct(ReservaRepository $reserva)
    {
        parent::__construct();
        $this->entityName = 'reservas.reservas';
        $this->repository = $reserva;
    }
}
